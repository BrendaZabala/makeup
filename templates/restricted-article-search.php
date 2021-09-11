<article class="producto">
    <div class="container-producto">
        <div class="producto-imagen">
            <?php echo '<img src="' . $makeup[$i]['image_link'] . '" alt="Sorry, we don\'t have the image :(" class="imagen"><br>'; ?>
        </div>
        <div class="producto-info">
            <p>
                <b>Name: </b> <?php echo $makeup[$i]['name'] ?>
                <br>
                <b>Price: </b> <?php echo $makeup[$i]['price_sign'], $makeup[$i]['price'] ?>
                <br>
                <b>Brand: </b> <?php echo $makeup[$i]['brand'] ?>
                <br>
                <b>Purchase link: </b> <?php echo '<a href="' . $makeup[$i]['product_link'] . '" target="_blank">¡Click here!</a>'; ?>
                <br>
                <b>Category: </b> <?php echo $makeup[$i]['category'] ?>
                <br>
                <b>Product type: </b> <?php echo $makeup[$i]['product_type'] ?>
                <br>
            
            <?php
            if ($makeup[$i]['tag_list']) {
                $res = '';
                for ($j=0; $j < count($makeup[$i]['tag_list']); $j++) {
                    $actual = $makeup[$i]['tag_list'][$j];
                    if ($j === 0) {
                        $res = $actual;
                    } else {
                        $res = $res . ', ' . $actual; 
                    }
                }
                echo '<b>Tags: </b>' . $res . '<br>';
            }
            if ($makeup[$i]['product_colors']) {
                $res = '';
                for ($j=0; $j < count($makeup[$i]['product_colors']); $j++) {
                    $actual = $makeup[$i]['product_colors'][$j]['colour_name'];
                    $get_color = $makeup[$i]['product_colors'][$j]['hex_value'];
                    $span = '<span class="span-color" style="background-color: ' . $get_color . ';" >ㅤ</span>';
                    if ($j === 0) {
                        $res = $span . '' . $actual;
                    } else {
                        $res = $res . ' ━ ' . $span . '' . $actual; 
                    }
                }
                echo '<b>Colors: </b>' . $res . '<br>';
            }
            ?>
            </p>
        </div>
    </div>
    <div class="producto-desc">
        <?php 
        if(!empty($makeup[$i]['description']) && str_word_count($makeup[$i]['description']) < 60){
            echo '<b>Description: </b>' . $makeup[$i]['description'];
        }
        ?>
    </div>
    <button class="boton-fav">❤</button>
</article>