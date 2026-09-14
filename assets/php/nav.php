<?php
// Determine the current page for active-state detection
$currentScript = basename($_SERVER['SCRIPT_NAME']); // e.g. "rdr2.php", "index.php"
$isHomePage = ($currentScript === 'index.php' || $currentScript === '');

$navItems = [
    'home' => [
        'label' => '🏠 Home',
        'url' => '/',
        'active' => $isHomePage
    ],
	'rdr2natives' => [
        'label' => '💽 RDR2 Natives',
        'url' => 'rdr2.php',
        'active' => ($currentScript === 'rdr2.php')
    ],
    'gta5natives' => [
        'label' => '💽 GTA5 Natives',
        'url' => 'gta5.php',
        'active' => ($currentScript === 'gta5.php')
    ],
    'mp3natives' => [
        'label' => '💽 MP3 Natives',
        'url' => 'mp3.php',
        'active' => ($currentScript === 'mp3.php')
    ],
	'gta4natives' => [
        'label' => '💽 GTA4 Natives',
        'url' => 'gta4.php',
        'active' => ($currentScript === 'gta4.php')
    ],
	'rdrnatives' => [
        'label' => '💽 RDR Natives',
        'url' => 'rdr.php',
        'active' => ($currentScript === 'rdr.php')
    ],
	'mnclanatives' => [
        'label' => '💽 MNCLA Natives',
        'url' => 'mncla.php',
        'active' => ($currentScript === 'mncla.php')
    ],
	'generator' => [
        'label' => '⚡ Script Generator',
        'url' => 'creator.php',
        'active' => ($currentScript === 'creator.php')
    ],
    'converter' => [
        'label' => '♻️ List Converter',
        'url' => 'converter.php',
        'active' => ($currentScript === 'converter.php')
    ],
    'github' => [
        'label' => '🐙 Github',
        'url' => 'https://github.com/Deadlineem/RAGE-Tools',
        'active' => false
    ]
];