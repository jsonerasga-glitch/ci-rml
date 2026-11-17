<?php
/** Progress stepper for one request item. Expects $stage (int). */
$labels = \App\Libraries\CalibrationRequests::STAGES;
?>
<div class="stepper" aria-label="Progress: <?= esc($labels[$stage]) ?>">
  <?php foreach ($labels as $i => $label): ?>
    <div class="step <?= $i < $stage ? 'done' : ($i === $stage ? ($stage === count($labels) - 1 ? 'done' : 'current') : '') ?>"><?= esc($label) ?></div>
  <?php endforeach; ?>
</div>
