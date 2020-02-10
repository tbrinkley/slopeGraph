<?php

$color_graph_background = "0x000000"; //$_POST['$color_graph_background'];
$color_crosshair    = "0xFFFFFF";
$color_graphlines   = "0x888888";
$title              ='Final\'s Graph';
$error_message      ="The points you have selected go off the graph."; 
$title_color        = "0xFFBA00"; //formerly $col_ellipse
$title_system_font  = 5; //
$text_color         = "0xFFBA00";
//BLACK = 0,0,0
$red1   = 0;
$green1 = 0;
$blue1  = 0;

$option = $_POST['option'];


/* if the "submit" variable does not exist, the form has not been submitted - display initial page */
if (!isset($_POST['submit'])) {
    // Create a new image instance
$im = imagecreatetruecolor(800, 800);
//$text_color = ImageColorAllocate ($im, 233, 14, 91);
// choose a color for the ellipse



// Make the background white
imagefilledrectangle($im, 0, 0, 799, 799, 0xFFFFFF);

// Draw a text string on the image
imagestring($im, $title_system_font, 0, 0, $title, $title_color);
imageline ($im,400,0,400,800, 0xCCCCCC);
imageline ($im,0,400,800,400, 0xCCCCCC);

// draw the white ellipse
imagecolorallocate($im, 0, 0, 0);
imagefilledellipse($im, $x_input, $y_input, 2, 2, $color_point1);

// Output the image to browser
header('Content-type: image/gif');

imagegif($im);
imagedestroy($im);
}

else {

    // check email address
    if (!ereg('^[-]?[0-3-]?[0-9]?$', $_POST['X1'])) {
        die("$error_message");
    }

    // process the data
   // echo "The email address {$_POST['email']} has a valid structure. Doesn't mean it works!";
}
{
    // retrieve form data 


$x_input4 = $_POST['X4'];
$b_input2 = $_POST['B2'];
$g_height = 801;
$g_with = 801;
$height = 800;
$with =800;
//echo $y_input3; 
//echo $x_input3;
//echo $b_input1; 
//echo $x_input4;
//echo $b_input2;
//echo $x_input;
//echo $y_input;
// Create a new image instance
$im = imagecreatetruecolor($g_height, $g_with);
//$text_color = ImageColorAllocate ($im, 233, 14, 91);
//$col_ellipse = imagecolorallocate($im, 0, 25, 80);
// choose a color for the ellipse
$col_ellipse = imagecolorallocate($im, 0, 0, 155);

// Make the background white
imagefilledrectangle($im, 0, 0, 799, 799, 0xFFFFFF);
switch ($option){
    
    case 0:
        // Draw a text string on the image
        imagestring($im, $title_system_font, 0, 0, $title, $title_color);
        for ($x1=0; $x1<$height; $x1) {
            for ($y1=0; $y1<$height; $y1) {
                for ($x2=0; $x2<$height; $x2) {
                    for ($y2=0; $y2<$height; $y2) {
                        imageline ($im,$x1,0,$x2,800, 0x999999);  
                        imageline ($im,0,$y1,800,$y2, 0x999999);    
                        $x1 = $x1 + 10; //$x1 +=20        
                        $y1 = $y1 + 10; //$x1 +=20
                        $x2 = $x2 + 10; //$x1 +=20
                        $y2 = $y2 + 10; //$x1 +=20
                    }
                }
            }
        }
        
        //crosshair
        imageline ($im,400,0,400,800, 0x000000);
        imageline ($im,0,400,800,400, 0x000000);
        
        
        $x_input1 = $_POST['X1']; 
        $y_input1 = $_POST['Y1'];
        $x_input2 = $_POST['X2']; 
        $y_input2 = $_POST['Y2'];
        
        $output_x1=400+(10*$x_input1);
        $output_y1=400-(10*$y_input1);
        $output_x2=400+(10*$x_input2);
        $output_y2=400-(10*$y_input2);
        
        //y intercept
        $y_intercept=$y_input1 - $slope * $x_input1;
        //denominator & numerator
        $numerator= $output_y2 - $output_y1;
        $denominator= $output_x2 - $output_x1;
        //slope 
        $slope = -($numerator)/($denominator);
            if($denominator==0){
                $slope_equation= "x=". $x_input1;
            }
            else{
        $slope_equation = " Y= " . ($slope==0 ? " $y_input1" : " $slope". "x" . ($y_intercept>0 ? "+" : " "). "$y_intercept");
        }
        
        // draw the white ellipse
        imagecolorallocate($im, 0, 0, 200);
        imagefilledellipse($im, $output_x1, $output_y1, 8, 8, 0x0000CD);
        imagefilledellipse($im, $output_x2, $output_y2, 8, 8, 0x0000CD);
        imageline ($im,$output_x1,$output_y1,$output_x2,$output_y2, 0xFF0000);
        
        imagestring($im, $title_system_font, 20, 20, $slope_equation, $title_color);
        
        header('Content-type: image/gif');

        imagegif($im);
        imagedestroy($im);

    case 1:
    
    // Draw a text string on the image
        imagestring($im, $title_system_font, 0, 0, $title, $title_color);
        for ($x1=0; $x1<$height; $x1) {
            for ($y1=0; $y1<$height; $y1) {
                for ($x2=0; $x2<$height; $x2) {
                    for ($y2=0; $y2<$height; $y2) {
                        imageline ($im,$x1,0,$x2,800, 0x999999);  
                        imageline ($im,0,$y1,800,$y2, 0x999999);    
                        $x1 = $x1 + 10; //$x1 +=20        
                        $y1 = $y1 + 10; //$x1 +=20
                        $x2 = $x2 + 10; //$x1 +=20
                        $y2 = $y2 + 10; //$x1 +=20
                    }
                }
            }
        }
        //crosshair
        imageline ($im,400,0,400,800, 0x000000);
        imageline ($im,0,400,800,400, 0x000000);
        
        $y_input3 = $_POST['Y3']; 
        $x_input3 = $_POST['X3'];
        $b_input1 = $_POST['B1']; 
        
        $output_b1=400-(10*$b_input1);
        $output2_b1=400;
        $output_x3=400-(10*$x_input3);
        $output_y3=400+(10*$y_input3);
        //echo $y_input3;
        //echo $x_input3;
        
        imagefilledellipse($im, $output2_b1, $output_b1, 8, 8, 0x0000CD);
        //imagefilledellipse($im, $output_x3, $output2_b1, 8, 8, 0x0000CD);
        imagefilledellipse($im, $output_y3, $output_x3, 8, 8, 0x0000CD);
        imageline ($im,$output2_b1, $output_b1,$output_y3, $output_x3, 0xFF0000);
        
        //slope equation
        //y intercept
        $y_intercept=$y_input1 - $slope * $x_input1;
       //denominator & numerator
               $numerator2= -($y_input3 - $b_input1);
           $denominator2= $x_input3;
                   //slope 
        $slope2 = -($numerator2)/($denominator2);
                          
              imagestring($im, $title_system_font, 20, 20, "Slope: " . $slope2, $title_color);
        
        header('Content-type: image/gif');

        imagegif($im);
        imagedestroy($im);
        
    case 2:
    
    // Draw a text string on the image
        imagestring($im, $title_system_font, 0, 0, $title, $title_color);
        for ($x1=0; $x1<$height; $x1) {
            for ($y1=0; $y1<$height; $y1) {
                for ($x2=0; $x2<$height; $x2) {
                    for ($y2=0; $y2<$height; $y2) {
                        imageline ($im,$x1,0,$x2,800, 0x999999);  
                        imageline ($im,0,$y1,800,$y2, 0x999999);    
                        $x1 = $x1 + 10; //$x1 +=20        
                        $y1 = $y1 + 10; //$x1 +=20
                        $x2 = $x2 + 10; //$x1 +=20
                        $y2 = $y2 + 10; //$x1 +=20
                    }
                }
            }
        }
        //crosshair
        imageline ($im,400,0,400,800, 0x000000);
        imageline ($im,0,400,800,400, 0x000000);
 
    
    default :
    echo "wrong";
    break;
    // Output the image to browser
 

    }
}
?>
