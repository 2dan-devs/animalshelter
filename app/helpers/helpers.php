<?php

// app/helpers/helpers.php

############## Helper Function for Flash Messages ###########
class FlashMessage {
	public static function DisplayAlert($message, $type)
	{
		return '<div class="alert-box radius ' .$type. '">' .$message. '</div>';
	}
}