<?php
    require_once "../utilities/checkLogin.php";
    require_once "../DBEntities/GroupService.php";
    require_once "../DBEntities/DetailNameService.php";
    require_once "../DBEntities/GroupDetailService.php";
    require_once "../utilities/TableNames.php";
    require_once "../DBEntities/CompanyService.php";
    require_once "../DBEntities/GoodService.php";
    require_once "../DBEntities/GoodDetailService.php";

    require_once "../utilities/Utility.php";
    require_once "../utilities/UUID.php";
    require_once "../utilities/ImageResizer.php";

/**
 * @param $detail
 * @return array|bool
 */
function saveDetail($detail)
{
    $det = new DetailNameService(\utilities\TableNames::$DetailName);
    $det->setName($detail);
    $detId=false;
    if($det->singleInstaceSave())
        $detId=$det->getId();
    return $detId;
}

/**
 * @param $detId
 * @param $groupId
 */
function saveGroupDetail($detId, $groupId)
{
    $gDetail = new GroupDetailService(\utilities\TableNames::$GroupDetail);
    $gDetail->setDetailId($detId);
    $gDetail->setGroupId($groupId);
    $gDetail->save();
}

/**
 * @param $gGroupId
 * @param $gCompanyId
 * @param $gCount
 * @param $gPrice
 * @param $gOff
 * @param $gModel
 * @param $goodName
 * @param $pics
 * @return bool
 */
function saveGood($gGroupId, $gCompanyId, $gCount, $gPrice, $gOff, $gModel, $goodName, $pics, $gCode)
{
    $good = new GoodService(\utilities\TableNames::$Good);
    $good->setGroupId($gGroupId);
    $good->setCompanyId($gCompanyId);
    $good->setCount($gCount);
    $good->setPrice($gPrice);
    $good->setOff($gOff);
    $good->setModel($gModel);
    $good->setName($goodName);
    $good->setPics($pics);
    $good->setCode($gCode);
    if ($good->save())
        return $good->getId();
    return false;
}

/**
 * @param $d
 * @param $gGoodId
 * @return bool
 */
function saveGoodDetail($d, $gGoodId)
{
    $gDetail = explode(":", $d);
    if(count($gDetail)>1)
    {
        $goodDetail = new GoodDetailService(\utilities\TableNames::$GoodDetail);
        $goodDetail->setGoodId($gGoodId);
        $goodDetail->setDetailId($gDetail[0]);
        $goodDetail->setValue($gDetail[1]);
        if ($goodDetail->save())
            return true;
        return false;
    }else
        return true;
}

function saveGoodPics()
{
    $messageResult="";

    if(!empty($_FILES))
    {
        $targetPicDir="../uploaded/goodPics/";
        $targetSavedPicDir="uploaded/goodPics/";
        foreach($_FILES as $file)
        {
            $id=UUID::v5("154d057f-5a45-4334-85ae-e6ffab44bbaf", Utility::generateRandomString(10));

            $tempDir="../uploaded/temp/";

            $fName = $file["name"];
            $fileNameSections= explode(".",$fName);
            $ext = $fileNameSections[count($fileNameSections)-1];
            $tempFileName=$tempDir.$id.".".$ext;
            $fileName=$targetPicDir.$id.".".$ext;
            $savedFileName=$targetSavedPicDir.$id.".".$ext;
            move_uploaded_file($file["tmp_name"],$tempFileName);

            $img=new ImageResizer($tempFileName);
            $img->resizeImage(170,150);
            $img->saveImage($fileName);

            unlink($tempFileName);
            $messageResult.=$savedFileName.",";
        }
        $messageResult=substr($messageResult,0,strlen($messageResult)-1);
    }
    return $messageResult;
}

if(isset($_POST["formName"]))
    {
        $formName=$_POST["formName"];
        if($formName==="group")
        {
            $name=$_POST["name"];
            $parentId=$_POST["parentId"];

            $gr=new GroupService(\utilities\TableNames::$Group);
            $gr->setName($name);
            $gr->setParentId($parentId);
            $gr->setIsActive(true);
            if($gr->save())
            {
                if(isset($_POST["details"]))
                {
                    foreach($_POST["details"] as $detail)
                    {
                        //save detail
                        $detId = saveDetail($detail);
                        //save groupdetail
                        saveGroupDetail($detId, $gr->getId());
                    }
                }
            }
            else
                echo "data saved";
        }
        elseif($formName==="good")
        {
            $goodName=$_POST["goodName"];
            $gCompanyId=$_POST["company"];
            $gGroupId=$_POST["group"];
            $gPrice=$_POST["price"];
            $gOff=$_POST["off"];
            $gModel=$_POST["model"];
            $gCount=$_POST["count"];
            $gCode=$_POST["code"];
            $gPics=saveGoodPics();

            $gGoodId= saveGood($gGroupId, $gCompanyId, $gCount, $gPrice, $gOff, $gModel, $goodName,$gPics,$gCode);
            if($gGoodId!=false)
            {
                if(isset($_POST["details"]))
                {
                    $ds=explode(",",$_POST["details"]);
                    foreach($ds as $d)
                    {
                        if(!saveGoodDetail($d, $gGoodId))
                        {
                            echo "مقادیر توضیحات ثبت نشد";
                            die();
                        }

                    }
                }
                echo '<h1 align="center" style="color: #4cae4c;">'.'اطلاعات با موفقیت ثبت شد'.'</h1>';
            }
            else{
                echo "محصول ثبت نشد";
                die();
            }


        }
        elseif($formName==="company")
        {
            $com=new CompanyService(\utilities\TableNames::$Company);
            $com->setName($_POST["companyName"]);
            if($com->save())
                echo "<h1 align='center'>اطلاعات ثبت شد</h1>";
            else
                echo "<h1 align='center'>خطا در ثبت اطلاعات</h1>";
        }
    }

    $group=new GroupService(\utilities\TableNames::$Group);
    $groups=$group->getByProperties(array("parent_id"=>0));

    $company=new CompanyService(\utilities\TableNames::$Company);
    $companies=$company->getAll();

    $rGood=new GoodService(\utilities\TableNames::$Good);
    $registerdGoods=$rGood->getLastInsertedGoods(5);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KURD-KALA panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


    <script src="jquery-1.12.2.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->

            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>KURD</b>-KALA</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->

    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">


            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu ">
                <li class="header">منوی مدیریت</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> داشبورد </i>
                    </a>

                </li>




                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>جداول</span>

                    </a>

                </li>
                <li>

                </li>
                <li>
                    <a href="MailBox.html">
                        <i class="fa fa-envelope"></i> <span>مدیریت ایمیل ها</span>
                        <small class="label pull-right bg-yellow">12</small>
                    </a>
                </li>
                <li>
                    <a href="Managing.html">
                        <i class="glyphicon glyphicon-hand-up"></i> <span>مدیریت کالا ها</span>

                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-user"></i> <span>مدیریت کاربران</span>
                        <small class="label pull-right bg-yellow">3</small>

                    </a>
                </li>




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                مدیریت

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li class="active">مدیریت</li>
            </ol>

            <section class="content">
                <div class="row" >
                    <div class="col-md-9" >
                        <div class="container ">
                            <h2>مدیریت کالا ها</h2>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#GroupAndSubgroup">ثبت گروه و زیرگروه</a></li>
                                <li><a data-toggle="tab" href="#NewGood">ثبت اجناس</a></li>
                                <li><a data-toggle="tab" href="#NewCompany">ثبت شرکت سازنده جدید</a></li>
                                <li><a data-toggle="tab" href="#ShowGoods">مشاهده اجناس</a></li>

                            </ul>

                            <div class="tab-content">
                                <div id="GroupAndSubgroup" class="tab-pane fade in active">
                                    <div class="row" style="margin-top: 30px;">
                                        <div class="col-md-9" >
                                            <div class="col-md-4">


                                            </div>
                                            <div class="col-md-4" >

                                            </div>
                                            <div class="col-md-4">
                                                <form action="managing.php" method="post">
                                                    <select class="form-control pull-right" style="margin-top: 30px" dir="rtl" name="parentId">
                                                        <option value="0">انتخاب کنید</option>
                                                        <?php
                                                            foreach($groups as $gp)
                                                                echo '<option value="'.$gp->getId().'">'.$gp->getName().'</option>';
                                                        ?>
                                                    </select>
                                                    <br/>
                                                    <br/>

                                                        <div class="input-group pull-right" style="margin-top:20px;width: 100%" dir="rtl">

                                                            <input name="name" type="text" class="form-control" placeholder="اسم گروه ..." aria-describedby="basic-addon1">


                                                        </div>

                                                    <br/>

                                                    <div class="btn btn-primary glyphicon glyphicon-plus "  style="margin-top:10px;width: 100%;margin-right: 10px" id="newDetail"></div>
                                                    <br/>
                                                    <br/>
                                                    <h class="pull-right">مشخصه های زیرگروه</h>
                                                    <br/>
                                                    <input type="hidden" name="formName" value="group"/>
                                                    <div class="well" id="subGroupDetails"></div>
                                                    <input type="submit" value="ثبت" class="btn btn-primary pull-right"/>
                                                </form>


                                                </div>


                                            </div>

                                        </div>


                                </div>

                                <div id="NewGood" class="tab-pane fade">
                                    <div class="col-md-9">
                                        <div class="col-md-4">


                                        </div>
                                        <div class="col-md-4" >

                                        </div>
                                        <div class="col-md-4" >
                                            <select id="groupSelect" class="form-control pull-right" style="margin-top: 30px" dir="rtl">
                                                <option value="0">انتخاب کنید</option>
                                                <?php
                                                foreach($groups as $gp)
                                                    echo '<option value="'.$gp->getId().'">'.$gp->getName().'</option>';
                                                ?>
                                            </select>
                                            <form id="frmGood" action="managing.php" method="post" enctype="multipart/form-data">

                                                <select id="groupId" class="form-control pull-right" name="group" style="margin-top: 30px" dir="rtl">
                                                    <option value="0">انتخاب کنید</option>
                                                </select>
                                                <select class="form-control pull-right" name="company" style="margin-top: 30px" dir="rtl">
                                                    <option value="0">انتخاب کنید</option>
                                                    <?php
                                                    foreach($companies as $comp)
                                                        echo '<option value="'.$comp->getId().'">'.$comp->getName().'</option>';
                                                    ?>
                                                </select>

                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">

                                                        <input type="text" name="goodName" class="form-control" placeholder="اسم کالا ..." aria-describedby="basic-addon1">


                                                    </div>


                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">

                                                        <input type="text" name="price" class="form-control" placeholder="قیمت ..." aria-describedby="basic-addon1">


                                                    </div>


                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">

                                                        <input type="text" name="off" class="form-control" placeholder="بن تخفیف ..." aria-describedby="basic-addon1">


                                                    </div>


                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">

                                                        <input type="text" name="model" class="form-control" placeholder="مدل ..." aria-describedby="basic-addon1">


                                                    </div>

                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">

                                                        <input type="text" name="count" class="form-control" placeholder="موجودی ..." aria-describedby="basic-addon1">


                                                    </div>

                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">

                                                        <input type="text" name="code" class="form-control" placeholder="کد محصول ..." aria-describedby="basic-addon1">


                                                    </div>

                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">
                                                        <input type="file" name="pic1" class="form-control" placeholder="عکس محصول" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">
                                                        <input type="file" name="pic2" class="form-control" placeholder="عکس محصول" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">
                                                        <input type="file" name="pic3" class="form-control" placeholder="عکس محصول" aria-describedby="basic-addon1">
                                                    </div>
                                                    <input type="hidden" name="formName" value="good"/>


                                            </form>
                                            <section id="detailsSec">

                                            </section>
                                            <button id="submitForm" class="btn btn-success pull-right" style="margin-top:30px;width: 83%;margin-right: 10px">ثبت</button>
                                        </div>


                                    </div>
                                </div>

                                <div id="NewCompany" class="tab-pane fade">
                                    <div class="col-md-9">
                                        <div class="col-md-4">


                                        </div>
                                        <div class="col-md-4" >

                                        </div>
                                        <div class="col-md-4">

                                            <form action="managing.php" method="post">
                                                <div class="input-group pull-right" style="margin-top:30px;width: 83%;margin-right: 10px" dir="rtl">

                                                    <input type="text" name="companyName" class="form-control" placeholder="نام شرکت ... " aria-describedby="basic-addon1">


                                                </div>
                                                <input type="hidden" name="formName" value="company"/>
                                                <input type="submit" class="btn btn-success pull-right" value="ثبت" style="margin-top:30px;width: 83%;margin-right: 10px"/>
                                            </form>

                                        </div>
                                    </div>

                                </div>
                                <div id="ShowGoods" class="tab-pane fade table-responsive">
                                    <table class="table table-bordered " style="width: 900px">
                                        <thead>
                                            <tr>
                                                <th>کد</th>
                                                <th> گروه</th>
                                                <th>اسم</th>
                                                <th>مدل</th>
                                                <th>قیمت</th>
                                                <th>تعداد</th>
                                                <th>بن تخفیف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($registerdGoods!=false)
                                            {
                                                foreach($registerdGoods as $rg)
                                                {
                                                    echo '<tr>
                                                            <td>'.$rg->getCode().'</td>
                                                            <td>'.$rg->getGroupId().'</td>
                                                            <td>'.$rg->getName().'</td>
                                                            <td>'.$rg->getModel().'</td>
                                                            <td>'.$rg->getPrice().'</td>
                                                            <td>'.$rg->getCount().'</td>
                                                            <td>'.$rg->getOff().'</td>
                                                        </tr>';
                                                }
                                            }
                                        ?>


                                        </tbody>

                                    </table>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </section>
    </div><!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="application/javascript">
        $(".deleteProperty").click(function () {
            deleteMe($(this));
        });
        $('#newDetail').click(function() {

            newProp='<div><div class="input-group pull-right" style="width: 80%" dir="rtl"><input name="details[]" type="text" class="form-control" placeholder="اسم مشخصه ..." aria-describedby="basic-addon1"></div><section style="cursor: hand;" class="deleteProperty btn btn-danger" onclick="deleteMe(this)">X</section></div>';
            $("#subGroupDetails").append(newProp);
            oldData='<section class="detail"><input style="margin-top: 8px;" type="text" dir="rtl"class="form-control" name="detail[]" placeholder="نام مشخصه ..."><div style="cursor: hand;" class="deleteProperty btn btn-danger" onclick="deleteMe(this)">X</div></section>';
        });
        function deleteMe(elem){
            elem.closest("div").remove();
        }
    </script>
    <!------------------------------------------------------------------------------------------------------>
    <script type="text/javascript">
        $("#groupSelect").change(function(){
            var groupId=$( "#groupSelect option:selected" ).val();
            $.post( "getSubGroup.php", { groupId: groupId })
                .done(function( data ) {
                    $( "#groupId" ).empty().append( data );
                    //alert( "Data Loaded: " + data );
                });
        });
        $("#groupId").change(function () {
            var groupId=$( "#groupId option:selected" ).val();
            if(groupId!="0" && groupId!=0)
            {
                $.post( "getGroupDetail.php", { groupId: groupId })
                    .done(function( data ) {
                        $( "#detailsSec" ).empty().append( data );
                        //alert( "Data Loaded: " + data );
                    });
            }
        });

        $("#submitForm").click(function(){
            //jsonResult();
            anotherPost();
        });

        $.postJSON = function(url, data, success, arg) {
            args = $.extend({
                url: url,
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                async: true,
                success: success
            }, arg);
            return $.ajax(args);
        };



        function jsonResult()
        {
            var values, index;

            // Get the parameters as an array
            values = $("#frmGood").serializeArray();
            var message="";
            // Find and replace `content` if there
            var inps=[];
            for (index = 0; index < values.length; ++index) {
                var inp=[values[index].name,values[index].value];
                inps.push(inp);
                //message+=values[index].name+":"+values[index].value+"\n";
                /*if (values[index].name == "content") {
                 values[index].value = content_val;
                 break;
                 }*/
            }

            var data=$(".subDetail");
            var dets=[];
            var mess="";
            for(index=0; index<data.length; ++index)
            {
                /*var inp=[data[index].name,data[index].value];
                 dets.push(inp);*/
                mess+=data[index].name+":"+data[index].value+",";
                //message+=detId+":"+valueD+"\n";
            }
            values.push({name: "details", value: mess});
            $.post("managing.php",$.param(values),function(result){
                alert(result);
            });

            /*var jsonObj={inputs:inps,details:dets};

             //alert(jsonObj);
             $.ajax({
             url: 'addGood.php',
             type: 'post',
             dataType: 'json',
             success: function (returnedData) {
             alert(returnedData);
             },
             data: jsonObj
             });*/

            /*$.postJSON("addGood.php",jsonObj,function(returnedData){
             alert(returnedData);
             });*/

            // Add it if it wasn't there
            /*if (index >= values.length) {
             values.push({
             name: "content",
             value: content_val
             });
             }*/
        }

        function anotherPost()
        {
            var dat=$(".subDetail");
            var mess="";
            for(index=0; index<dat.length; ++index)
            {
                mess+=dat[index].name+":"+dat[index].value+",";
            }

            $("#frmGood").append('<input type="hidden" name="details" value="'+mess+'"/>');
            $("#frmGood").submit();
        }

    </script>

</body>
</html>

