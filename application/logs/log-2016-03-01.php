<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2016-03-01 01:53:50 --> UTF-8 Support Enabled
DEBUG - 2016-03-01 01:53:50 --> No URI present. Default controller set.
DEBUG - 2016-03-01 01:53:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2016-03-01 01:53:51 --> Loading torrent feeds
DEBUG - 2016-03-01 01:53:51 --> Getting list of scheduled cron tasks from database.
DEBUG - 2016-03-01 01:53:51 --> ::::: CRON JOB ::::: Initiating cron job to spider feeds
DEBUG - 2016-03-01 01:53:51 --> Spidering Feeds -> Beginning to spider pirateproxy.pw.
DEBUG - 2016-03-01 01:53:51 --> Spidering Feeds -> Processing Pirate Bay Feed -> https://pirateproxy.pw/browse/207/100/7/0
DEBUG - 2016-03-01 01:53:51 --> Getting URL -> https://pirateproxy.pw/browse/207/100/7/0
DEBUG - 2016-03-01 01:53:53 --> Getting URL -> https://pirateproxy.pw/browse/207/100/7/0 -> HTTP Code 200 returned.
DEBUG - 2016-03-01 01:53:53 --> Spidering Feeds -> ERROR: Cant find element SearchResults table in DOM. Likely PirateBay Page Layout has changed.
DEBUG - 2016-03-01 01:53:53 --> Spidering Feeds -> Issue with getting Feed has halted process for this Feed.
DEBUG - 2016-03-01 01:53:53 --> Spidering Feeds -> Beginning to spider ahoy.re.
DEBUG - 2016-03-01 01:53:53 --> Spidering Feeds -> URL is malformed so amending to the appropriate Pirate Bay format.
DEBUG - 2016-03-01 01:53:53 --> Spidering Feeds -> Processing Pirate Bay Feed -> https://ahoy.re/browse/207/33/7/0
DEBUG - 2016-03-01 01:53:53 --> Getting URL -> https://ahoy.re/browse/207/33/7/0
DEBUG - 2016-03-01 01:53:55 --> Getting URL -> https://ahoy.re/browse/207/33/7/0 -> HTTP Code 200 returned.
DEBUG - 2016-03-01 01:53:55 --> Spidering Feeds -> Saving Torrents spidered from feeds
DEBUG - 2016-03-01 01:53:55 --> Spidering Feeds -> All spidered torrents saved.
DEBUG - 2016-03-01 01:53:55 --> Spidering Feeds -> Processing Pirate Bay Feed -> https://ahoy.re/browse/207/34/7/0
DEBUG - 2016-03-01 01:53:55 --> Getting URL -> https://ahoy.re/browse/207/34/7/0
DEBUG - 2016-03-01 01:53:57 --> Getting URL -> https://ahoy.re/browse/207/34/7/0 -> HTTP Code 200 returned.
DEBUG - 2016-03-01 01:53:57 --> Spidering Feeds -> Issue with getting Feed has halted process for this Feed.
DEBUG - 2016-03-01 01:53:57 --> Spidering Feeds -> Beginning to spider jltorrent.com.
DEBUG - 2016-03-01 01:53:57 --> Spidering Feeds -> URL is malformed so amending to the appropriate Pirate Bay format.
DEBUG - 2016-03-01 01:53:57 --> Spidering Feeds -> Processing Pirate Bay Feed -> https://jltorrent.com/browse/207/0/7/0
DEBUG - 2016-03-01 01:53:57 --> Getting URL -> https://jltorrent.com/browse/207/0/7/0
DEBUG - 2016-03-01 01:53:58 --> Getting URL -> https://jltorrent.com/browse/207/0/7/0 -> HTTP Code 404 returned.
DEBUG - 2016-03-01 01:53:58 --> Spidering Feeds -> ERROR: Cant find element SearchResults table in DOM. Likely PirateBay Page Layout has changed.
DEBUG - 2016-03-01 01:53:58 --> Spidering Feeds -> Issue with getting Feed has halted process for this Feed.
DEBUG - 2016-03-01 01:53:58 --> ::::: CRON JOB ::::: Initiating cron job to send torrents from main table to download client.
DEBUG - 2016-03-01 01:53:58 --> QBittorrent -> Getting torrent list.
DEBUG - 2016-03-01 01:53:58 --> Getting URL -> http://localhost:8083/query/torrents -> HTTP Code 200 returned.
DEBUG - 2016-03-01 01:53:58 --> ::::: CRON JOB ::::: Initiating cron job to import discovered torrents from staging table to main table.
DEBUG - 2016-03-01 01:53:58 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Minions. Using URL -> http://www.omdbapi.com/?t=Minions&r=json
DEBUG - 2016-03-01 01:53:59 --> Importing Torrent from Staging -> Saving torrent [filename -> Minions. imdbid -> tt2293640] to main DB.
DEBUG - 2016-03-01 01:53:59 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Minions. imdbid -> tt2293640].
DEBUG - 2016-03-01 01:53:59 --> Importing Torrent from Staging -> Removing Torrent #1151 from Staging DB.
DEBUG - 2016-03-01 01:53:59 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Room. Using URL -> http://www.omdbapi.com/?t=Room&r=json
DEBUG - 2016-03-01 01:54:00 --> Importing Torrent from Staging -> Saving torrent [filename -> Room. imdbid -> tt3170832] to main DB.
DEBUG - 2016-03-01 01:54:00 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Room. imdbid -> tt3170832].
DEBUG - 2016-03-01 01:54:00 --> Importing Torrent from Staging -> Removing Torrent #1152 from Staging DB.
DEBUG - 2016-03-01 01:54:00 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Get Hard. Using URL -> http://www.omdbapi.com/?t=Get+Hard&r=json
DEBUG - 2016-03-01 01:54:01 --> Importing Torrent from Staging -> Saving torrent [filename -> Get Hard. imdbid -> tt2561572] to main DB.
DEBUG - 2016-03-01 01:54:01 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Get Hard. imdbid -> tt2561572].
DEBUG - 2016-03-01 01:54:01 --> Importing Torrent from Staging -> Removing Torrent #1153 from Staging DB.
DEBUG - 2016-03-01 01:54:01 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Edge of Tomorrow. Using URL -> http://www.omdbapi.com/?t=Edge+of+Tomorrow&r=json
DEBUG - 2016-03-01 01:54:03 --> Importing Torrent from Staging -> Saving torrent [filename -> Edge of Tomorrow. imdbid -> tt1631867] to main DB.
DEBUG - 2016-03-01 01:54:03 --> Importing Torrent from Staging -> Removing Torrent #1154 from Staging DB.
DEBUG - 2016-03-01 01:54:03 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Carol. Using URL -> http://www.omdbapi.com/?t=Carol&r=json
DEBUG - 2016-03-01 01:54:04 --> Importing Torrent from Staging -> Saving torrent [filename -> Carol. imdbid -> tt2402927] to main DB.
DEBUG - 2016-03-01 01:54:04 --> Importing Torrent from Staging -> Removing Torrent #1155 from Staging DB.
DEBUG - 2016-03-01 01:54:04 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Mad Max Fury Road. Using URL -> http://www.omdbapi.com/?t=Mad+Max+Fury+Road&r=json
DEBUG - 2016-03-01 01:54:05 --> Importing Torrent from Staging -> Saving torrent [filename -> Mad Max: Fury Road. imdbid -> tt1392190] to main DB.
DEBUG - 2016-03-01 01:54:05 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Mad Max: Fury Road. imdbid -> tt1392190].
DEBUG - 2016-03-01 01:54:05 --> Importing Torrent from Staging -> Removing Torrent #1156 from Staging DB.
DEBUG - 2016-03-01 01:54:05 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Imitation Game. Using URL -> http://www.omdbapi.com/?t=The+Imitation+Game&r=json
DEBUG - 2016-03-01 01:54:06 --> Importing Torrent from Staging -> Saving torrent [filename -> The Imitation Game. imdbid -> tt2084970] to main DB.
DEBUG - 2016-03-01 01:54:06 --> Importing Torrent from Staging -> Removing Torrent #1157 from Staging DB.
DEBUG - 2016-03-01 01:54:06 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Big Hero 6. Using URL -> http://www.omdbapi.com/?t=Big+Hero+6&r=json
DEBUG - 2016-03-01 01:54:06 --> Importing Torrent from Staging -> Saving torrent [filename -> Big Hero 6. imdbid -> tt2245084] to main DB.
DEBUG - 2016-03-01 01:54:06 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Big Hero 6. imdbid -> tt2245084].
DEBUG - 2016-03-01 01:54:06 --> Importing Torrent from Staging -> Removing Torrent #1158 from Staging DB.
DEBUG - 2016-03-01 01:54:06 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Kingsman: The Secret Service. Using URL -> http://www.omdbapi.com/?t=Kingsman:+The+Secret+Service&r=json
DEBUG - 2016-03-01 01:54:07 --> Importing Torrent from Staging -> Saving torrent [filename -> Kingsman: The Secret Service. imdbid -> tt2802144] to main DB.
DEBUG - 2016-03-01 01:54:07 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Kingsman: The Secret Service. imdbid -> tt2802144].
DEBUG - 2016-03-01 01:54:07 --> Importing Torrent from Staging -> Removing Torrent #1159 from Staging DB.
DEBUG - 2016-03-01 01:54:07 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Insurgent. Using URL -> http://www.omdbapi.com/?t=Insurgent&r=json
DEBUG - 2016-03-01 01:54:08 --> Importing Torrent from Staging -> Saving torrent [filename -> Insurgent. imdbid -> tt2908446] to main DB.
DEBUG - 2016-03-01 01:54:08 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Insurgent. imdbid -> tt2908446].
DEBUG - 2016-03-01 01:54:08 --> Importing Torrent from Staging -> Removing Torrent #1160 from Staging DB.
DEBUG - 2016-03-01 01:54:08 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Fight Club. Using URL -> http://www.omdbapi.com/?t=Fight+Club&r=json
DEBUG - 2016-03-01 01:54:09 --> Importing Torrent from Staging -> Removing Torrent #1161 from Staging DB.
DEBUG - 2016-03-01 01:54:09 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Ex Machina. Using URL -> http://www.omdbapi.com/?t=Ex+Machina&r=json
DEBUG - 2016-03-01 01:54:10 --> Importing Torrent from Staging -> Saving torrent [filename -> Ex Machina. imdbid -> tt0470752] to main DB.
DEBUG - 2016-03-01 01:54:10 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Ex Machina. imdbid -> tt0470752].
DEBUG - 2016-03-01 01:54:10 --> Importing Torrent from Staging -> Removing Torrent #1162 from Staging DB.
DEBUG - 2016-03-01 01:54:10 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Martian. Using URL -> http://www.omdbapi.com/?t=The+Martian&r=json
DEBUG - 2016-03-01 01:54:11 --> Importing Torrent from Staging -> Saving torrent [filename -> The Martian. imdbid -> tt3659388] to main DB.
DEBUG - 2016-03-01 01:54:11 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> The Martian. imdbid -> tt3659388].
DEBUG - 2016-03-01 01:54:11 --> Importing Torrent from Staging -> Removing Torrent #1163 from Staging DB.
DEBUG - 2016-03-01 01:54:11 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Lion King. Using URL -> http://www.omdbapi.com/?t=The+Lion+King&r=json
DEBUG - 2016-03-01 01:54:12 --> Importing Torrent from Staging -> Removing Torrent #1164 from Staging DB.
DEBUG - 2016-03-01 01:54:12 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Divergent. Using URL -> http://www.omdbapi.com/?t=Divergent&r=json
DEBUG - 2016-03-01 01:54:13 --> Importing Torrent from Staging -> Saving torrent [filename -> Divergent. imdbid -> tt1840309] to main DB.
DEBUG - 2016-03-01 01:54:13 --> Importing Torrent from Staging -> Removing Torrent #1165 from Staging DB.
DEBUG - 2016-03-01 01:54:13 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Exodus: Gods and Kings. Using URL -> http://www.omdbapi.com/?t=Exodus:+Gods+and+Kings&r=json
DEBUG - 2016-03-01 01:54:15 --> Importing Torrent from Staging -> Saving torrent [filename -> Exodus: Gods and Kings. imdbid -> tt1528100] to main DB.
DEBUG - 2016-03-01 01:54:15 --> Importing Torrent from Staging -> Removing Torrent #1166 from Staging DB.
DEBUG - 2016-03-01 01:54:15 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Age of Adaline. Using URL -> http://www.omdbapi.com/?t=The+Age+of+Adaline&r=json
DEBUG - 2016-03-01 01:54:15 --> Importing Torrent from Staging -> Saving torrent [filename -> The Age of Adaline. imdbid -> tt1655441] to main DB.
DEBUG - 2016-03-01 01:54:15 --> Importing Torrent from Staging -> Removing Torrent #1167 from Staging DB.
DEBUG - 2016-03-01 01:54:15 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Star Wars: Episode I - The Phantom Menace. Using URL -> http://www.omdbapi.com/?t=Star+Wars:+Episode+I+-+The+Phantom+Menace&r=json
DEBUG - 2016-03-01 01:54:17 --> Importing Torrent from Staging -> Removing Torrent #1168 from Staging DB.
DEBUG - 2016-03-01 01:54:17 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Good Dinosaur. Using URL -> http://www.omdbapi.com/?t=The+Good+Dinosaur&r=json
DEBUG - 2016-03-01 01:54:17 --> Importing Torrent from Staging -> Saving torrent [filename -> The Good Dinosaur. imdbid -> tt1979388] to main DB.
DEBUG - 2016-03-01 01:54:17 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> The Good Dinosaur. imdbid -> tt1979388].
DEBUG - 2016-03-01 01:54:17 --> Importing Torrent from Staging -> Removing Torrent #1169 from Staging DB.
DEBUG - 2016-03-01 01:54:17 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Pitch Perfect 2. Using URL -> http://www.omdbapi.com/?t=Pitch+Perfect+2&r=json
DEBUG - 2016-03-01 01:54:18 --> Importing Torrent from Staging -> Saving torrent [filename -> Pitch Perfect 2. imdbid -> tt2848292] to main DB.
DEBUG - 2016-03-01 01:54:18 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> Pitch Perfect 2. imdbid -> tt2848292].
DEBUG - 2016-03-01 01:54:18 --> Importing Torrent from Staging -> Removing Torrent #1170 from Staging DB.
DEBUG - 2016-03-01 01:54:18 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Maze Runner. Using URL -> http://www.omdbapi.com/?t=The+Maze+Runner&r=json
DEBUG - 2016-03-01 01:54:19 --> Importing Torrent from Staging -> Saving torrent [filename -> The Maze Runner. imdbid -> tt1790864] to main DB.
DEBUG - 2016-03-01 01:54:19 --> Importing Torrent from Staging -> Torrent already exists in main DB, therefore not imported [filename -> The Maze Runner. imdbid -> tt1790864].
DEBUG - 2016-03-01 01:54:19 --> Importing Torrent from Staging -> Removing Torrent #1171 from Staging DB.
DEBUG - 2016-03-01 01:54:19 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Birdman. Using URL -> http://www.omdbapi.com/?t=Birdman&r=json
DEBUG - 2016-03-01 01:54:20 --> Importing Torrent from Staging -> Removing Torrent #1172 from Staging DB.
DEBUG - 2016-03-01 01:54:20 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Knock Knock. Using URL -> http://www.omdbapi.com/?t=Knock+Knock&r=json
DEBUG - 2016-03-01 01:54:21 --> Importing Torrent from Staging -> Removing Torrent #1173 from Staging DB.
DEBUG - 2016-03-01 01:54:21 --> Importing Torrent from Staging -> Getting movie information from omdbapi for American Ultra. Using URL -> http://www.omdbapi.com/?t=American+Ultra&r=json
DEBUG - 2016-03-01 01:54:22 --> Importing Torrent from Staging -> Saving torrent [filename -> American Ultra. imdbid -> tt3316948] to main DB.
DEBUG - 2016-03-01 01:54:22 --> Importing Torrent from Staging -> Removing Torrent #1174 from Staging DB.
DEBUG - 2016-03-01 01:54:22 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Peanuts Movie. Using URL -> http://www.omdbapi.com/?t=The+Peanuts+Movie&r=json
DEBUG - 2016-03-01 01:54:23 --> Importing Torrent from Staging -> Saving torrent [filename -> The Peanuts Movie. imdbid -> tt2452042] to main DB.
DEBUG - 2016-03-01 01:54:23 --> Importing Torrent from Staging -> Removing Torrent #1175 from Staging DB.
DEBUG - 2016-03-01 01:54:23 --> Total execution time: 32.9173
DEBUG - 2016-03-01 22:57:32 --> UTF-8 Support Enabled
DEBUG - 2016-03-01 22:57:32 --> No URI present. Default controller set.
DEBUG - 2016-03-01 22:57:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2016-03-01 22:57:33 --> Loading torrent feeds
DEBUG - 2016-03-01 22:57:33 --> Getting list of scheduled cron tasks from database.
DEBUG - 2016-03-01 22:57:33 --> ::::: CRON JOB ::::: Initiating cron job to spider feeds
DEBUG - 2016-03-01 22:57:33 --> Spidering Feeds -> Beginning to spider pirateproxy.pw.
DEBUG - 2016-03-01 22:57:33 --> Spidering Feeds -> Processing Pirate Bay Feed -> https://pirateproxy.pw/browse/207/100/7/0
DEBUG - 2016-03-01 22:57:33 --> Getting URL -> https://pirateproxy.pw/browse/207/100/7/0
DEBUG - 2016-03-01 22:57:33 --> Getting URL -> https://pirateproxy.pw/browse/207/100/7/0 -> HTTP Code 200 returned.
DEBUG - 2016-03-01 22:57:33 --> Spidering Feeds -> ERROR: Cant find element SearchResults table in DOM. Likely PirateBay Page Layout has changed.
DEBUG - 2016-03-01 22:57:33 --> Spidering Feeds -> Issue with getting Feed has halted process for this Feed.
DEBUG - 2016-03-01 22:57:33 --> Spidering Feeds -> Beginning to spider ahoy.re.
DEBUG - 2016-03-01 22:57:33 --> Spidering Feeds -> URL is malformed so amending to the appropriate Pirate Bay format.
DEBUG - 2016-03-01 22:57:33 --> Spidering Feeds -> Processing Pirate Bay Feed -> https://ahoy.re/browse/207/33/7/0
DEBUG - 2016-03-01 22:57:33 --> Getting URL -> https://ahoy.re/browse/207/33/7/0
DEBUG - 2016-03-01 22:57:34 --> Getting URL -> https://ahoy.re/browse/207/33/7/0 -> HTTP Code 200 returned.
DEBUG - 2016-03-01 22:57:34 --> Spidering Feeds -> ERROR: Cant find element SearchResults table in DOM. Likely PirateBay Page Layout has changed.
DEBUG - 2016-03-01 22:57:34 --> Spidering Feeds -> Issue with getting Feed has halted process for this Feed.
DEBUG - 2016-03-01 22:57:34 --> Spidering Feeds -> Beginning to spider jltorrent.com.
DEBUG - 2016-03-01 22:57:34 --> Spidering Feeds -> URL is malformed so amending to the appropriate Pirate Bay format.
DEBUG - 2016-03-01 22:57:34 --> Spidering Feeds -> Processing Pirate Bay Feed -> https://jltorrent.com/browse/207/0/7/0
DEBUG - 2016-03-01 22:57:34 --> Getting URL -> https://jltorrent.com/browse/207/0/7/0
DEBUG - 2016-03-01 22:57:36 --> Getting URL -> https://jltorrent.com/browse/207/0/7/0 -> HTTP Code 200 returned.
DEBUG - 2016-03-01 22:57:36 --> Spidering Feeds -> ERROR: Cant find element SearchResults table in DOM. Likely PirateBay Page Layout has changed.
DEBUG - 2016-03-01 22:57:36 --> Spidering Feeds -> Issue with getting Feed has halted process for this Feed.
DEBUG - 2016-03-01 22:57:36 --> ::::: CRON JOB ::::: Initiating cron job to send torrents from main table to download client.
DEBUG - 2016-03-01 22:57:36 --> QBittorrent -> Getting torrent list.
DEBUG - 2016-03-01 22:57:37 --> Getting URL -> http://localhost:8083/query/torrents -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:37 --> QBittorrent -> Failed to get Torrent list or torrent list empty.
DEBUG - 2016-03-01 22:57:38 --> QBittorrent -> Adding Inception (2010) 1080p BrRip x264 - 1.85GB - YIFY torrent to download queue with magnet: magnet:?xt=urn:btih:224bf45881252643dfc2e71abc7b2660a21c68c4&dn=Inception+%282010%29+1080p+BrRip+x264+-+1.85GB+-+YIFY&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:39 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:39 --> Updating torrent (#1140) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:39 --> QBittorrent -> Adding Entourage (2015) 720p BrRip x264 - YIFY torrent to download queue with magnet: magnet:?xt=urn:btih:3e85c9d8696a3fc472e49eecf018884669a7bd59&dn=Entourage+%282015%29+720p+BrRip+x264+-+YIFY&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:40 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:40 --> Updating torrent (#1144) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:40 --> QBittorrent -> Adding Interstellar (2014) 720p BrRip x264 - YIFY torrent to download queue with magnet: magnet:?xt=urn:btih:6e88b3f25ba49d483d740a652bf013c341bc5373&dn=Interstellar+%282014%29+720p+BrRip+x264+-+YIFY&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:41 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:41 --> Updating torrent (#1070) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:41 --> QBittorrent -> Adding Inside Out (2015) 720p BrRip x264 - YIFY torrent to download queue with magnet: magnet:?xt=urn:btih:4b3dce31c713b02726f67e2ef49de9ff965ec3b7&dn=Inside+Out+%282015%29+720p+BrRip+x264+-+YIFY&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:42 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:42 --> Updating torrent (#1052) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:42 --> QBittorrent -> Adding Room 2015 1080p BluRay x264 DTS-JYK torrent to download queue with magnet: magnet:?xt=urn:btih:a276c90d93bc11e7180adb07175a0f2f3942a62f&dn=Room+2015+1080p+BluRay+x264+DTS-JYK&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:44 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:44 --> Updating torrent (#1078) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:44 --> QBittorrent -> Adding The Wolf of Wall Street (2013) 1080p BrRip x264 - YIFY torrent to download queue with magnet: magnet:?xt=urn:btih:4b642d022980e5ebaa7cf4b6e1cc93769921cb42&dn=The+Wolf+of+Wall+Street+%282013%29+1080p+BrRip+x264+-+YIFY&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:45 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:45 --> Updating torrent (#1105) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:45 --> QBittorrent -> Adding Mad Max: Fury Road (2015) 1080p BrRip x264 - YIFY torrent to download queue with magnet: magnet:?xt=urn:btih:13241fe16a2797b2a41b7822bde970274d6b687c&dn=Mad+Max%3A+Fury+Road+%282015%29+1080p+BrRip+x264+-+YIFY&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:46 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:46 --> Updating torrent (#1060) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:46 --> QBittorrent -> Adding Spotlight (2015) 720p BrRip x264 - VPPV torrent to download queue with magnet: magnet:?xt=urn:btih:3a5fbb674f4e2deebad86f80188fbeb67059b92b&dn=Spotlight+%282015%29+720p+BrRip+x264+-+VPPV&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:47 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:47 --> Updating torrent (#1095) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:47 --> QBittorrent -> Adding Guardians of the Galaxy (2014) 1080p BrRip x264 - YIFY torrent to download queue with magnet: magnet:?xt=urn:btih:11a2ac68a11634e980f265cb1433c599d017a759&dn=Guardians+of+the+Galaxy+%282014%29+1080p+BrRip+x264+-+YIFY&tr=udp%3A%2F%2Ftracker.openbittorrent.com%3A80&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969
DEBUG - 2016-03-01 22:57:48 --> Getting URL -> http://localhost:8083/command/download -> Empty response... Failed to connect to localhost port 8083: Connection refused
DEBUG - 2016-03-01 22:57:48 --> Updating torrent (#1118) in torrent queue database to be downloading
DEBUG - 2016-03-01 22:57:48 --> ::::: CRON JOB ::::: Initiating cron job to import discovered torrents from staging table to main table.
DEBUG - 2016-03-01 22:57:48 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Man from U N C L E. Using URL -> http://www.omdbapi.com/?t=The+Man+from+U+N+C+L+E&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1176 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for If I Stay. Using URL -> http://www.omdbapi.com/?t=If+I+Stay&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1177 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for . Using URL -> http://www.omdbapi.com/?t=&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1178 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Spotlight. Using URL -> http://www.omdbapi.com/?t=Spotlight&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1179 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Maleficent. Using URL -> http://www.omdbapi.com/?t=Maleficent&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1180 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Notebook. Using URL -> http://www.omdbapi.com/?t=The+Notebook&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1181 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Ant-Man. Using URL -> http://www.omdbapi.com/?t=Ant-Man&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1182 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Taken 3. Using URL -> http://www.omdbapi.com/?t=Taken+3&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1183 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for . Using URL -> http://www.omdbapi.com/?t=&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1184 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Max. Using URL -> http://www.omdbapi.com/?t=Max&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1185 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Secret in Their Eyes. Using URL -> http://www.omdbapi.com/?t=Secret+in+Their+Eyes&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1186 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for It Follows. Using URL -> http://www.omdbapi.com/?t=It+Follows&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1187 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Grand Budapest Hotel. Using URL -> http://www.omdbapi.com/?t=The+Grand+Budapest+Hotel&r=json
ERROR - 2016-03-01 22:57:49 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Removing Torrent #1188 from Staging DB.
DEBUG - 2016-03-01 22:57:49 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Vacation. Using URL -> http://www.omdbapi.com/?t=Vacation&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1189 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for True Story. Using URL -> http://www.omdbapi.com/?t=True+Story&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1190 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Pixels. Using URL -> http://www.omdbapi.com/?t=Pixels&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1191 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for BECK Steinar. Using URL -> http://www.omdbapi.com/?t=BECK+Steinar&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1192 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Teenage Mutant Ninja Turtles. Using URL -> http://www.omdbapi.com/?t=Teenage+Mutant+Ninja+Turtles&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1193 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Room. Using URL -> http://www.omdbapi.com/?t=Room&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1194 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for The Hunger Games: Catching Fire. Using URL -> http://www.omdbapi.com/?t=The+Hunger+Games:+Catching+Fire&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1195 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Cinderella. Using URL -> http://www.omdbapi.com/?t=Cinderella&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1196 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for . Using URL -> http://www.omdbapi.com/?t=&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1197 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Burnt. Using URL -> http://www.omdbapi.com/?t=Burnt&r=json
ERROR - 2016-03-01 22:57:50 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Removing Torrent #1198 from Staging DB.
DEBUG - 2016-03-01 22:57:50 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Unfinished Business. Using URL -> http://www.omdbapi.com/?t=Unfinished+Business&r=json
ERROR - 2016-03-01 22:57:51 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:51 --> Importing Torrent from Staging -> Removing Torrent #1199 from Staging DB.
DEBUG - 2016-03-01 22:57:51 --> Importing Torrent from Staging -> Getting movie information from omdbapi for Trumbo. Using URL -> http://www.omdbapi.com/?t=Trumbo&r=json
ERROR - 2016-03-01 22:57:51 --> Severity: Notice --> Trying to get property of non-object C:\Bitnami\wampstack-5.5.29-1\apache2\htdocs\application\controllers\torrents\Main.php 92
DEBUG - 2016-03-01 22:57:51 --> Importing Torrent from Staging -> Removing Torrent #1200 from Staging DB.
DEBUG - 2016-03-01 22:57:51 --> Total execution time: 19.0170
