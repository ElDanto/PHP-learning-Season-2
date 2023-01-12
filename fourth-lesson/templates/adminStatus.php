<?php 
$status = $data['status'];
?>
<div style="text-align: center; font-weight: bold; padding: 12px; border: 2px solid <?php echo $status['statusColor']; ?>; color: <?php echo $status['statusColor']; ?>;">
    <span><?php echo $status['statusMessage']; ?></span>
</div>