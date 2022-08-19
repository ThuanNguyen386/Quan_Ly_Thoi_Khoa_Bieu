<?php
        session_start();
        if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
?>
<?php include '../controller/pre_subject_edit_input.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Input update subject</title>
        <link rel="stylesheet" href="../../web/css/subject_update_style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- JS & CSS library of MultiSelect plugin -->
        <script src="../../web/js/jquery.multiselect.js"></script>
        <script src="../../web/js/subject_update_input.js"></script>

        <link rel="stylesheet" href="../../web/css/jquery.multiselect.css">
    </head>

    <body>
        <div id="container" class="border">
            <div id="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Ten mon hoc -->
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Tên môn học</label>
                        </div>
                        <div class="col-75 pad-right re-position">
                            <?php
                                if (isset($er_subject)) {
                                    echo '
                                        <div class="popup pop-txt">
                                            <span class="popuptext myPopup">'.$er_subject.'
                                            </span>
                                        </div>
                                    ';
                                }
                            ?>
                            
                            <input type="text" id="subject" name="subject" class="border mrg-top" 
                                <?php 
                                    if(isset($val_subject)) echo ' value="'.$val_subject.'"';
                                ?>
                            >
                        </div>
                    </div>

                    <!-- Khóa -->
                    <div class="row">
                        <div class="col-25">
                            <label for="school_year">Khoá</label>
                        </div>
                        <div class="col-75 pad-right re-position">
                            <?php
                                if (isset($er_schoolyear)) {
                                    echo '
                                        <div class="popup pop-txt">
                                            <span class="popuptext myPopup ">'.$er_schoolyear.'
                                            </span>
                                        </div>
                                    ';
                                }
                            ?>
                            <select multiple id="school_year" name="school_year[]" class="border mrg-top" >
                                <?php
                                    foreach ($school_years as $code => $name) {
                                        echo '
                                            <option value="'.$code.'"';
                                        if (isset($_POST['school_year']) && in_array($code, $_POST['school_year'])) {
                                            echo 'selected';
                                        } else if(isset($school_year)) {
                                            if (in_array($code, $school_year)) {
                                                echo 'selected';
                                            }
                                        } else{}
                                        echo '>'.$name.'</option>
                                        ';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Mo ta chi tiet -->
                    <div class="row">
                        <div class="col-25">
                            <label for="description">Mô tả chi tiết</label>
                        </div>
                        <div class="col-75 re-position">
                            <?php
                                if(isset($er_desc)) {
                                    echo '
                                        <div class="popup pop-area">
                                            <span class="popuptext myPopup">'.$er_desc.'
                                            </span>
                                        </div>
                                    ';
                                }
                            ?>
                            <?php 
                                echo '<textarea id="description" name="description" class="txt-area border mrg-top" type="text">';
                                    if(isset($_POST['description'])) {
                                        echo htmlspecialchars($_POST['description']);
                                    } else if(isset($description)) echo htmlspecialchars($description);
                                    else{}
                                echo '</textarea>';
                            ?>
                        </div>
                    </div>
                    
                    <!-- Avatar -->
                    <div class="row">
                        <div class="col-25">
                            <label for="avatar">Avatar</label>
                        </div>
                        <div class="col-75">
                            <input type="hidden" id="tmp" name="tmp" value="<?php if (isset($_POST['tmp'])) {echo ($_POST['tmp']);} ?>">
                            <img 
                                <?php if(isset($src)) echo ' src="'.$src.'"'; ?>
                                id="avatar" data-name="avatar" class="avt-area border mrg-top">
                            </img>
                        </div>
                    </div>

                    <!-- Browse -->
                    <div class="row">
                        <div class="col-25"></div>
                        <div class="col-75 pad-right re-position">
                            <?php
                                if(isset($er_browser)) {
                                    echo '
                                        <div class="popup pop-brs">
                                            <span class="popuptext myPopup">'.$er_browser.'
                                            </span>
                                        </div>
                                    ';
                                }
                            ?>
                            <div class="col-75" >
                                <input type="text" id="browser-text" name="browser-text" class="border" 
                                    <?php
                                        if (isset($browser_text)) {
                                            echo ' placeholder="'.$browser_text.'"';
                                        }
                                        else if (isset($oldfile)) {
                                            echo ' placeholder="'.$oldfile.'"';
                                        }
                                    ?>
                                >
                                </input>
                                            
                            </div>
                            <div class="col-25" >
                                <input type="button" id="browser-btn" name="browser-btn" value="Browser" class="border brs brs-btn">
                            </div>
                            <div class="file-input btn-file">
                                <input type="file" id="browser" name="browser" accept="image/*" 
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Xac nhan -->
                    <div class="row pad wrapper">
                        <input type="submit" id="submit" name="submit" value="Xác Nhận">
                    </div>
                </form>
            </div>
        </div>        
    </body>
</html>