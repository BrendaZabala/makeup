<article class="producto producto-random">
    <div class="container-producto">
        <div class="producto-imagen">
            <?php echo '<img src="' . $makeup[$nro_al]['image_link'] . '" alt="Sorry, we don\'t have the image :(" class="imagen"><br>';?>
        </div>
        <div class="producto-info">
            <p>
                <b>Name: </b> <?php echo $makeup[$nro_al]['name'] ?>
                <br>
                <b>Price: </b> <?php echo $makeup[$nro_al]['price_sign'], $makeup[$nro_al]['price'] ?>
                <br>
                <b>Brand: </b> <?php echo $makeup[$nro_al]['brand'] ?>
                <br>
                <b>Purchase link: </b> <?php echo '<a href="' . $makeup[$nro_al]['product_link'] . '" target="_blank">¡Click here!</a>'; ?>
                <br>
                <b>Category: </b> <?php echo $makeup[$nro_al]['category'] ?>
                <br>
                <b>Product type: </b> <?php echo $makeup[$nro_al]['product_type'] ?>
                <br>
            
            <?php
            if ($makeup[$nro_al]['tag_list']) {
                $res = '';
                for ($i=0; $i < count($makeup[$nro_al]['tag_list']); $i++) {
                    $actual = $makeup[$nro_al]['tag_list'][$i];
                    if ($i === 0) {
                        $res = $actual;
                    } else {
                        $res = $res . ', ' . $actual; 
                    }
                }
                echo '<b>Tags: </b>' . $res . '<br>';
            }
            if ($makeup[$nro_al]['product_colors']) {
                $res = '';
                for ($i=0; $i < count($makeup[$nro_al]['product_colors']); $i++) {
                    $actual = $makeup[$nro_al]['product_colors'][$i]['colour_name'];
                    $get_color = $makeup[$nro_al]['product_colors'][$i]['hex_value'];
                    $span = '<span class="span-color" style="background-color: ' . $get_color . ';" >ㅤ</span>';
                    if ($i === 0) {
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
        if(!empty($makeup[$nro_al]['description']) && str_word_count($makeup[$nro_al]['description']) < 60){
            echo '<b>Description: </b>' . $makeup[$nro_al]['description'];
        }
        ?>
    </div>
</article>