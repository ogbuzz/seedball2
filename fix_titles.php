<?php
$storage = \Drupal::entityTypeManager()->getStorage('block_content');

$data = [
  2 => ['en_h3' => 'For Urban Gardeners', 'fr_h3' => 'Pour les jardiniers urbains'],
  3 => ['en_h3' => 'For Pollinator Flowers', 'fr_h3' => 'Pour les fleurs à pollinisateurs'],
  4 => ['en_h3' => 'For Those Who Love to Grow', 'fr_h3' => 'Pour ceux qui veulent cultiver'],
  5 => ['en_h3' => 'For Ecological Restoration', 'fr_h3' => 'Pour la restauration écologique'],
  6 => ['en_h3' => 'For the World Food Emergency', 'fr_h3' => 'Pour l\'urgence alimentaire mondiale'],
];

foreach ($data as $id => $info) {
  // Mettre à jour EN
  $block_en = $storage->load($id)->getTranslation('en');
  $body_en = $block_en->get('body')->value;
  $block_en->set('body', ['value' => '<h3>' . $info['en_h3'] . '</h3>' . $body_en, 'format' => 'full_html']);
  $block_en->save();
  print 'Block ' . $id . ' EN h3 ajouté.' . PHP_EOL;

  // Mettre à jour FR
  $block_fr = $storage->load($id)->getTranslation('fr');
  $body_fr = $block_fr->get('body')->value;
  $block_fr->set('body', ['value' => '<h3>' . $info['fr_h3'] . '</h3>' . $body_fr, 'format' => 'full_html']);
  $block_fr->save();
  print 'Block ' . $id . ' FR h3 ajouté.' . PHP_EOL;
}
