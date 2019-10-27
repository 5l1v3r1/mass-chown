<?php
/*
Mass Change Owner
Coded by FilthyRoot

Copyright (c) 2019 Jogjakarta Hacker Link 
*/
error_reporting(0);
function buka($dir,$user){
    $s=scandir($dir);
    foreach($s as $ss){
        if($ss == "." || $ss == ".."){continue;}else{
            if(is_dir($dir."/".$ss."/")){
                echo "[*] $user:$user => $ss\n";
                system("chown $user:$user '$dir/$ss/'");
                buka($dir."/".$ss."/",$user);
            }else{
                echo "[*] $user:$user => $ss\n";
                system("chown $user:$user '$dir/$ss'");
            }
        }
    }
}
function head(){
    echo "Mass Chown | by FilthyRoot\nJogjakarta Hacker Link (c) 2019\n\n";
}
head();
if($argv[1] && $argv[2]){
    buka($argv[1],$argv[2]);
}else{
    echo "Usage : php mass.php [dir] [user]\nExample : php mass.php /home/ apache\n";
}
