<?php
$items     = $attributes['items']     ?? [];
$columns   = $attributes['columns']   ?? 3;
$imageSize = $attributes['imageSize'] ?? 64;
$gap       = $attributes['gap']       ?? 4;
$fontSize  = $attributes['fontSize']  ?? 16;
$title     = $attributes['title']     ?? '';

$colClass = match ($columns) {
	1 => 'grid-cols-1',
	2 => 'grid-cols-1 sm:grid-cols-2',
	3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
	default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3'
};
?>

<h3 class="text-text-light dark:text-text-dark mb-3"><?php echo $title ?></h3>

<div class="grid <?php echo $colClass; ?> gap-<?php echo intval($gap); ?>">

<?php foreach ($items as $item): ?>
	<div class="p-6 bg-white rounded-xl shadow flex items-start gap-4">

		<?php if (!empty($item['icon'])): ?>
			<img
				src="<?php echo esc_url($item['icon']); ?>"
				alt=""
				class="rounded"
				style="width: <?php echo $imageSize; ?>px; height: <?php echo $imageSize; ?>px;"
			/>
		<?php endif; ?>

		<div>
			<h3 class="font-semibold" style="font-size: <?php echo $fontSize; ?>px;">
				<?php echo esc_html($item['title']); ?>
			</h3>

			<p class="text-gray-600">
				<?php echo esc_html($item['description']); ?>
			</p>
		</div>

	</div>
<?php endforeach; ?>

</div>
