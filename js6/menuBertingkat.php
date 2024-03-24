<?php 
$menu = [
[
    "nama" => "Beranda"
],

[
    "nama" => "Berita",
    "subMenu" => [
        [
            "nama" => "Wisata",
            "subMenu" => [
                [
                    "nama" => "Pantai"
                ],
                [
                    "nama" => "Gunung"
                ]
            ]
        ],
        [
            "nama" => "Kuliner"
        ],
        [
            "nama" => "Hiburan"
        ]
    ]
],
[
    "nama" => "Tentang" 
],
[
    "nama" => "Kontak" 
],
];

function tampilkanMenuBertingkat(array $menu){
    echo "<ul>";
    foreach ($menu as $key => $item){
        echo "<li>{$item['nama']}</li>";
    }
    echo "</ul>";
}
tampilkanMenuBertingkat($menu);
echo"<hr>";
echo"<br>";
// menampilkan fungsi rekursif menu bertingkat
function tampilkanMenuBertingkat1(array $menu, $level = 0) {
    echo "<ul>";
    foreach ($menu as $key => $item) {
      echo "<li>";
      for ($i = 0; $i < $level; $i++) {
        echo "&nbsp;&nbsp;";
      }
      echo "{$item['nama']}";
      if (isset($item['subMenu'])) {
        tampilkanMenuBertingkat1($item['subMenu'], $level + 1);
      }
      echo "</li>";
    }
    echo "</ul>";
  }
  
  tampilkanMenuBertingkat1($menu);
?>