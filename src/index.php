<?php
/**
 * Created by PhpStorm.
 * User: Huy Nguyen
 * Date: 04-Jan-20
 * Time: 11:31 AM
 */

    include '../dom/simple_html_dom.php';

    $tuoitre = 'https://tuoitre.vn';
    $html = file_get_html($tuoitre);
    $list_link =  $html->find('.title-news-list-focus a');
//    function get_1_news($data){
//        $link = 'https://tuoitre.vn'.$data;
//
//        return $data_link;
//    }



?>


<!doctype html>
<html>
<head>
    <title>Tin hot</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <script src="../asset/js/html2canvas.js"></script>
    <!-- Script -->
</head>
<body>
<!--    <input type='button' onclick="screen()" value='Take screenshot'><br/>-->
<br>
        <div class="row container" >
            <div class="col-6">
                <div class="" style="display: flex;">
                    <h5 >Tuổi trẩu</h5>
                    <input type="button" onclick="screen()" value="Take screen" style="margin-left: 50px">
                </div>

                <?php foreach ($list_link as $thutu => $ll): ?>
                    <div id='news<?php echo $thutu ?>'>
                        <a href="<?php
                            $link = 'https://tuoitre.vn'.$ll->href;
                            echo $link;
                            ?>"
                           target="_blank">
                            <h5>
                                <?php echo $ll->title ?>
                            </h5>
                        </a>
                        <?php
                            $web = file_get_html($link);
                            $title1 = $web->find('.main-content-body h2',0)->plaintext;
                            $p1 = $web->find('.content p',2)->plaintext;
                            $img = $web->find('.VCSortableInPreviewMode img',0);
                            //                        echo $img->src;
                            //                        echo '<br>';
                            //                        echo $title1;
                            //                        echo '<br>';
                            ////                        echo $p1;
                            //                        echo '<br>';
                        ?>
                        <img src="<?php echo $img->src?>" alt="" style="width: 500px">
                        <p><?php echo $title1?></p>
                        <p><?php echo $p1?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-6">
                <h5>Image</h5>
                <div id="ketqua">

                </div>
            </div>

        </div>
    <script type='text/javascript'>
        function screen() {
            var i = 0;
            for (i=0; i < 4; i++ ){
                var newss = "#news"+i;
                // var target = "target"+i;
                html2canvas(document.querySelector(newss),
                    {
                        allowTaint:true,
                    },
                ).then(canvas => {
                    document.getElementById('ketqua').appendChild(canvas);
                });
            }
        }

        // function screenshot(id){
        //     var newss = "#news"+id;
        //     var target = "target"+id;
        //     newss = newss.toString();
        //     target = target.toString();
        //     html2canvas(document.querySelector(newss),
        //         {
        //             allowTaint:true,
        //             onclone:true
        //         },
        //     ).then(canvas => {
        //         document.getElementById(target).appendChild(canvas);
        //     });
        //
        // }
    </script>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../asset/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
