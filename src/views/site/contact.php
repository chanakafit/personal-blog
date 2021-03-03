<?php
echo "<div class='container'>";
$xml = simplexml_load_file( 'channels.xml' ) or die( 'Failed to read data' );
$i = 0;
foreach ( $xml->channels as $channelsElement ) {
	echo "<img class='responsive' src='";
	echo $channelsElement->banner;
	echo "'><br>";
	echo "<form method='post' action='index.php' id=form-{$i}";
	echo "<input type='hidden' type='text' name='url' value='";
	echo $channelsElement->url;
	echo "'><br>";
	echo "<input id='wrapper' type='submit' name='submit' value='PLAY CHANNEL'>";
	echo "</form>";
	echo "<br>";
	$i++;
}
?>
<?php
if ( isset( $_POST['url'] ) ) {
	shell_exec( "sudo killall vlc" );
	shell_exec( "sudo killall omxplayer.bin" );
	shell_exec( "sudo omxplayer `youtube-dl -g " . ( $_POST['url'] ) . " ` >> /dev/null &" );
}
?>