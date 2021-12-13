<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<body>

<input type="color" id="color">
<div class="cover">
    <?php

    $state = false;

    $index = 0;

    for($x = 0; $x < 9; $x++){
        echo "<div class='row'>";

        $index = 9 * $x;

        if($state){
            for($y = 9; $y > 0; $y--){
                $v = $y + $index;
                echo "<div  onmousedown='window.colorThis(this, true, $v)' onmouseenter='window.colorThis(this, false, $v)' class='brick'></div>";
            }
        } else {
            for($y = 1; $y <= 9; $y++){
                $v = $y + $index;
                echo "<div  onmousedown='window.colorThis(this, true, $v)' onmouseenter='window.colorThis(this, false, $v)' class='brick'></div>";
            }
        }
        $state = !$state;

        echo "</div>";
    }
    ?>
</div>

</body>
</html>

<script>

    window.hexToRgb = (hex) => {
        let result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    };

    document.addEventListener('mousedown', ()=>{
        window.mousePressed = true;
    });

    document.addEventListener('mouseup', ()=>{
        window.mousePressed = false;
    });

    window.color = document.querySelector('#color');

    window.colorThis = (elem, force = false, index) =>{
        if(window.mousePressed || force){
            let color = hexToRgb(window.color.value);
            elem.style.background = window.color.value;
            window.save(index, color);
        }
    };

    window.save = (index, color) => {
        axios.post('save.php', {index: index, color: color})
        .then((resp) => {
            console.log(resp);
        });
    }

</script>

<style>
    .cover{
        user-select: none;
        margin: 0 auto;
        width: fit-content;
        border: 1px solid #000;
    }
    .row{
        display: flex;
    }
    .brick{
        height: 50px;
        width: 50px;
        background: #fff;
        display: block;
        border: 2px solid #000;
    }
</style>