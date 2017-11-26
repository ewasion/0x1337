# 0x1337
PHP file uploader with password.

## Usage
`curl -F "img=@example.png" -F "pass=example" example.com`

( Edit in index.php, lines 3 for password and 4 for domain name )

## Cron job
( To delete files after 2 days (172800 seconds) )

/etc/cron.hourly

```bash
#!/bin/bash
for img in /var/www/i/*; do # Change for yours
    if [[ $img != "/var/www/i/index.php" ]]; then # Change for yours
        secondsAlive=$(($(date +%s) - $(date +%s -r $img)))
        if [[ $secondsAlive -gt 172800 ]]; then
            rm $img
        fi
    fi
done
```

## SCREENSHOOT SCRIPT
(Change password and i.capuno.cat for your domain)

```bash
#!/bin/bash

# Script to make a screenshot, save it, post it to img.capuno.cat
# and copy the url.
# ----------------------------------------
# Made by Capuno, GPLv3
# Dependencies: gnome-screenshot curl xclip libnotify-bin

password=""

gnome-screenshot -af /tmp/foo.png
curl -F "img=@/tmp/foo.png" -F "pass=$password" https://i.capuno.cat | tr -d '\n' | xclip -selection clipboard
rm /tmp/foo.png
notify-send "Screenshoot" "URL copied to clipboard." -u low
```
