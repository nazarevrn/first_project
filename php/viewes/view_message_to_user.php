<?php
    class Show_message_to_user
	{
		public $message;

        public function show_message($message)
		{
			echo '
            <html>
            <head>
            </head>
	        <body>
	            <script type="text/javascript">alert("' . $message . '");</script>
	        </body>
            </html>';
		}
	}
?>