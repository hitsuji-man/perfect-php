<?php
/** 接続情報を管理するクラス */
class DbManager 
{
    // PDOクラスのインスタンスを配列で保持する
    protected $connections = array();
    // テーブルごとのRepositoryクラスと接続名の対応を格納
    protected $repository_connection_map = array();

    public function connect($name, $params)
    {
        // $params配列から値を取り出す際にキーが存在するかのチェックをしないで済むようにする
        $params = array_merge(array(
            'dsn'       => null,
            'user'      => '',
            'password'  => '',
            'options'   => array(),
        ), $params);

        // PDOクラスのインスタンスを作成
        $con = new PDO(
            $params['dsn'],
            $params['user'],
            $params['password'],
            $params['options']
        );

        // PDOの内部でエラーが起きた際に例外を発生させる
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->connections[$name] = $con;
    }

    /**
     * connect()メソッドで接続したコネクションを取得する
     *
     * @param string $name
     * @return array|PDO
     */
    public function getConnection($name = null)
    {
        if (is_null($name)) {
            return current($this->connections);
        }

        return $this->connections[$name];
    }

    /**
     * Repositoryと使用する接続名の対応を登録する
     * @param mixed $repository_name
     * @param mixed $name
     * @return void
     */
    public function setReposityConnectionMap($repository_name, $name)
    {
        $this->repository_connection_map[$repository_name] = $name;
    }

    /**
     * Repositoryクラスに対応するDB接続を取得する(未設定の場合はデフォルト接続) 
     * @param mixed $repository_name
     * @return array|PDO
     */
    public function getConnectionForRepository($repository_name)
    {
        if (isset($this->repository_connection_map[$repository_name])) {
            $name = $this->repository_connection_map[$repository_name];
            $con = $this->getConnection($name);
        } else {
            $con = $this->getConnection();
        }

        return $con;
    }
}