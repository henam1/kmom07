<div class='comment-form'>
    <form method=post>
        <input type=hidden name="redirect" value="<?=$this->url->create($pageType)?>">
        <input type=hidden name="pageType" value='<?=$pageType?>'>
        <fieldset>
        <legend>Redigera en kommentar</legend>
        <p><label>Kommentar:<br/><textarea name='content'><?=$content?></textarea></label></p>
        <p><label>Namn:<br/><input type='text' name='name' value='<?=$name?>'/></label></p>
        <p><label>Hemsida:<br/><input type='text' name='web' value='<?=$web?>'/></label></p>
        <p><label>Email:<br/><input type='text' name='mail' value='<?=$mail?>'/></label></p>
        <p class=buttons>
            <input type='submit' name='doCreate' value='Spara' onClick="this.form.action = '<?=$this->url->create('comment/save').'/' . $id?>'"/>
            <input type='reset' value='Återställ'/>
            <input type='submit' value='Tillbaka' onClick="this.form.action = '<?=$this->url->create($pageType)?>'"/>
        </p>
        </fieldset>
    </form>
</div>
