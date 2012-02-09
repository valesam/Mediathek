<?PHP
$array = array ( 'Europa' => array ( 'Land1' => 'Deutschland',
                                     'Land2' => 'Italien',
                                     'Land3' => 'Holland' ),
                 'Suedamerika' => array ( 'Land1' => 'Peru',
                                          'Land2' => 'Argentinien',
                                          'Land3' => 'Brasilien' ) );

echo $array['Europa']['Land1'] . '<br>';
echo $array['Europa']['Land2'] . '<br>';
echo $array['Europa']['Land3'] . '<br>';
echo $array['Suedamerika']['Land1'] . '<br>';
echo $array['Suedamerika']['Land2'] . '<br>';
echo $array['Suedamerika']['Land3'] . '<br>';
?>
