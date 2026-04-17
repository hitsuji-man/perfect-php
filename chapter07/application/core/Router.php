<?php

class Router 
{
    protected $routes;

    public function __construct($definitions)
    {
        $this->routes = $this->compileRoutes($definitions);
    }

    // ルーティング定義配列を変換するメソッド
    public function compileRoutes($definitions)
    {
        $routes = array();

        foreach ($definitions as $url => $params) {
            // URLの区切り文字は/なので、/ごとに分割
            $tokens = explode('/', ltrim($url, '/'));
            foreach ($tokens as $i => $token) {
                // 分割した値の中に:で始まる文字列があった場合には、正規表現の形に変換する
                if (0 === strpos($token, ':')) {
                    $name = substr($token, 1);
                    $token = '(?P<' . $name . '>[^/]+)';
                }
                $tokens[$i] = $token; 
            }

            // 分割したURLを再度/で繋げ、変換済みの値として$routesに格納
            $pattern = '/' . implode('/', $tokens);
            $routes[$pattern] = $params;
        }

        return $routes;
    }

    // 変換済みのルーティング定義配列とPATH_INFOのマッチングを行い、ルーティングパラメータの特定を行うメソッド
    public function resolve($path_info)
    {
        // PATH_INFOの先頭が/でない場合、/を付与
        if ('/' !== substr($path_info,0,1)) {
            $path_info = '/' . $path_info;
        }

        foreach ($this->routes as $pattern => $params) {
            // 変換済みのルーティング定義配列は$rotuesプロパティに格納されているので、正規表現を使ってマッチング
            if (preg_match('#^' . $pattern . '$#', $path_info, $matches)) {
                // マッチした場合、定義された値とキャプチャした値をマージして$params変数に1つのルーティングパラメータとして格納し、それを返す
                $params = array_merge($params, $matches);
                return $params;
            }
        }

        return false;
    }
}