<?php require 'partials/head.php' ?>
<?php if($error != ""){ ?>
<div><?php echo $error; ?></div>
<?php }else{ ?>
<div class="form_top">
    <form action="/update" method="post" class="decor">
         <div class="circle"></div>
         <div class="form-inner">
             <input type="hidden" name="id" value="<?php echo $task["id"]; ?>" >
             <textarea name="text" placeholder="Текст..." rows="5"  required oninvalid="this.setCustomValidity('Текст не может быть пустым');" onchange="try{setCustomValidity('')}catch(e){};"><?php echo $task["description"]; ?></textarea>
             <button type="submit" href="/">Редактировать</button>
         </div>
       </form>
     </body>
</div>
<?php } ?>
