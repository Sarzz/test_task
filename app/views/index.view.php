<?php require 'partials/head.php' ?>

<div class="buttton_style" id="new_task"> Добавить задачу</div>
<div class="form_top" style="display: none;">
    <form action="/new-task" method="post" class="decor">
         <div class="circle"></div>
         <div class="form-inner">
           <input type="text" name="name" placeholder="Название" required oninvalid="this.setCustomValidity('Название не может быть пустым');" onchange="try{setCustomValidity('')}catch(e){};">
           <input type="email" name="email" placeholder="Почтовый ящик" required oninvalid="this.setCustomValidity('Почтовый ящик не валиден');" onchange="try{setCustomValidity('')}catch(e){};">
           <textarea name="text" placeholder="Текст..." rows="5"  required oninvalid="this.setCustomValidity('Текст не может быть пустым');" onchange="try{setCustomValidity('')}catch(e){};"></textarea>
           <button type="submit" href="/">Добавить</button>
         </div>
       </form>
     </body>
</div>
<table border="1" cellpadding="10" cellspacing="0" class="report products-form">
    <thead>
        <tr>
            <th class="sortColumn">
                <a href="?nm=<?php echo $nm ?>" value="as">Название</a>
            </th>
            <th class="sortColumn">
                <a href="?em=<?php echo $em ?>" value="as">Email</a>
            </th>
            <th  class="sortColumn">
                <a href="?ds=<?php echo $ds ?>" value="as">Description</a>
            </th>
            <th>
                <a href="?st=<?php echo $st ?>" value="st">Status</a>
            </th>
            <?php if(USER){ ?>
                <td>Выполнено</td>
                <td></td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tasks as $item){ ?>
        <tr id="<?php echo $item["id"]; ?>">
            <td class="typeColumn">
                <?php echo $item["name"]; ?>
            </td>
            <td class="titleColumn">
                <?php echo $item["email"]; ?>
            </td>
            <td class="titleColumn">
                <?php echo $item["description"]; ?>
            </td>
            <td>
                <div class="product-action">
                    <div class="product-action-dropdown">
                        <?php if($item["edited_date"] != null){ ?>
                            <span class="block">Отредактировано администратором</span>
                        <?php }if($item["completed"] != '0'){ ?>
                            <span class="block">Выполнено</span>
                        <?php } ?>
                    </div>
                </div>
            </td>
            <?php if(USER){ ?>
                <td>
                    <input type="checkbox" class="complated" <?php if($item["completed"] != '0'){ echo "checked"; } ?> value="<?php echo $item["id"] ?>">
                </td>
                <td>
                    <a href="task?id=<?php echo $item["id"]; ?>">Edit</a>
                </td>
            <?php } ?>
        </tr>

    <?php } if($totalPages > 1){
        if($page == '1'){} ?>

        <center><a href="<?php echo $page_link; ?>1">First</a>
        <?php
        if($page > 1)
        echo '<a href="'.$page_link.($page - 1).'">Back</a>&nbsp';

        for($i = 1; $i <= $totalPages; $i++)
        {
        if($i == $page)
        echo '<strong>'.$i.'</strong>&nbsp';
        else
        echo '<a href="'.$page_link.$i.'">'.$i.'</a>&nbsp';
        }

        if ($page < $totalPages)
        echo '<a href="'.$page_link.($page + 1).'">Next</a>&nbsp;';

        echo '<a href="'.$page_link.$totalPages.'">Last</a></center>';
        ?>
    <?php } ?>
    </tbody>
</table>
