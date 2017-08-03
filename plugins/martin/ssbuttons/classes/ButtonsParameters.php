<?php

    namespace Martin\SSButtons\Classes;

    use Lang;

    class ButtonsParameters {

        public static function getParameters($title, $url) {

            $parameters = [

                // 'twitter' => [
                //     'href'  => 'https://twitter.com/share?url=' . urlencode($url) . '&text=' . urlencode($title),
                //     'title' => 'Share on Twitter',
                //     'class' => ['ssbuttons' => 'btn btn-twitter', 'ssbuttonsnb' => 'share-btn twitter'],
                //     'icon'  => 'fa fa-twitter',
                //     'label' => 'Twitter',
                //     'image' => 'twitter',
                // ],

                'facebook' => [
                    'href'  => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url),
                    'title' => 'Share on Facebook',
                    'class' => ['ssbuttons' => 'btn btn-facebook', 'ssbuttonsnb' => 'share-btn facebook'],
                    'icon'  => 'fa fa-facebook',
                    'label' => 'Facebook',
                    'image' => 'facebook',
                    'name' => 'facebook',
                ],

              

                // 'email' => [
                //     'href'  => 'mailto:?subject=' . urlencode($title) . '&body=' . urlencode($title) . ':%20' . urlencode($url),
                //     'title' => 'Email',
                //     'class' => '',
                //     'icon'  => '',
                //     'label' => 'Email',
                //     'image' => 'email',
                // ],

            ];

            return $parameters;

        }

    }

?>