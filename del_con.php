<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Course Event Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
<link href="http://twitter.github.io/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.css" type="stylesheet">
<link href="http://twitter.github.io/bootstrap/assets/css/docs.css" rel="stylesheet">
<section class="row span6">
	<h3 class="page-header">Course Event Tool</h3>

<section class="row span6">
			        <form id='login' class='form-horizontal' method='post' action='convo_delete.php'>
										<fieldset>
  												<label>Canvas Domain (something.instructure.com)</label>
												<input type='text' name='domain' class='InputBox'>
												<label>Course List (Comma separated, No spaces)</label>
												<input type='textbox' name='course_list' class='InputBox'>
												<label>Account Number</label>
												<input type='text' name='account_number' class='InputBox'><br>
												<label>Event Type</label>
												<select name='event'>
													<option value="offer">Publish</option>
													<option value="conclude">Conclude</option>
													<option value="delete">Delete</option>
													<option value="undelete">Undelete</option>
												</select>												
											<input type='submit' name='submit' value='Submit' class='btn btn-primary'>
										</fieldset>
									</form>
								</section>
								</section>
