
<?php

    function getContent() 
    {
        $file = "./feed-cache.txt";
        $current_time = time();
        $expire_time = 5 * 60;
        $file_time = filemtime($file);
        if(file_exists($file) && ($current_time - $expire_time < $file_time)) {
            return file_get_contents($file);
        } else {
            $content = getFreshContent();
            file_put_contents($file, $content);
            return $content;
        }
    }

    function getFreshContent() 
    {
        $html = "";
        $newsSource = [
            "HN" => [
            "title" => "Hacker News",
            "url" => "https://news.ycombinator.com/rss"
            ],
            "BBC" => [
                "title" => "BBC",
                "url" => "http://feeds.bbci.co.uk/news/world/rss.xml"
            ]
        ];

        function getFeed($url)
        {
            $rss = simplexml_load_file($url);
            $count = 0;
            $html .= '<ul>';
            foreach($rss->channel->item as$item) {
                $count++;
                if($count > 7){
                    break;
                }
                $html .= '<li><a href="'.htmlspecialchars($item->link).'">'.htmlspecialchars($item->title).'</a></li>';
            }
            $html .= '</ul>';
            return $html;
        }

        foreach($newsSource as $source) {
            $html .= '<h5>'.$source["title"].'</h5>';
            $html .= getFeed($source["url"]);
        }
        return $html;

    }