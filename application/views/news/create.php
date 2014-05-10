<h2>Create a news item</h2>

<?php echo validation_errors();?>

<?php echo form_open('news/create')?>	<!--Form helper: form_open() => CSRF prevention & form validations-->
	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="text">Text</label>
	<textarea name="text"></textarea><br />

	<input type="submit" name="submit" value="Create news item" />
</form>