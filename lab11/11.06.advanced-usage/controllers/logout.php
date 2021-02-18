<?php

require_once __DIR__.'/settings.php';

user_logout();
header("Location: {$data['base']}/login.php");