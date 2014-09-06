    <form action="createlist.php" method="post">
        <fieldset>
            <div class="form-group">
                <input autofocus class="form-control" name="title" placeholder="Top Ten..." type="text"/>
            </div>
            <!-- uses PHP to create all the answer fields -->
            <? for ($i = 0; $i < 10; $i++): ?>
            <div class="form-group">
                <input class="form-control" name="<?= $i ?>" placeholder="#<?= $i+1 ?>" type="text"/>
            </div>
            <? endfor ?>                       
            <div class="form-group">
                <button type="submit" class="btn btn-default">Create!</button>
            </div>
        </fieldset>
    </form>
