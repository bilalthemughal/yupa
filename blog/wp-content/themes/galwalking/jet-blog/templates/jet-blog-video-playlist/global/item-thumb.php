<?php
/**
 * Playlist item title template
 */

$thumb = isset( $video_data['thumbnail_medium'] ) ? $video_data['thumbnail_medium'] : $video_data['thumbnail_default'];
?>
<div class="jet-blog-playlist__item-thumb<?php echo $hide['image']; ?>">
	<img src="<?php echo $thumb; ?>" alt="" class="jet-blog-playlist__item-thumb-img">
</div>