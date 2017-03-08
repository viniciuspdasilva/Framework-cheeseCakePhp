<?php
    /**
     * Created by PhpStorm.
     * User: vinicius.psilva
     * Date: 08/03/2017
     * Time: 15:36
     */

    namespace Core;


    abstract class Gramar
    {

        protected const OPERADOR_SOMA  = '+';
        protected const OPERADOR_SUB   = '-';
        protected const OPERADOR_MULT  = '*';
        protected const OPERADOR_DIV   = '/';

        protected const OPERADOR_IGUAL = '=';
        protected const OPERADOR_MAIOR = '>';
        protected const OPERADOR_MENOR = '<';
        protected const OPERADOR_MENOR_IGUAL = '<=';
        protected const OPERADOR_MAIOR_IGUAL = '>=';
        protected const OPERADOR_DIFERENTE = '<>';
        protected const OPERADOR_IGUAL_NULL = '<=>';

        protected const OPERADOR_E   = 'AND';
        protected const OPERADOR_OU  = 'OR';
        protected const OPERADOR_NOT = 'NOT';
        protected const OPERADOR_XOR = 'XOR';
        protected const OPERADOR_IS_NULL  = 'IS NULL';
        protected const OPERADOR_NOT_NULL = 'IS NOT NULL';

        protected const OPERADOR_BETWEEN = 'BETWEEN';
        protected const OPERADOR_IN = 'IN';
        protected const OPERADOR_NOT_IN = 'NOT IN';
        protected const OPERADOR_COALESCE = 'COALESCE';
        protected const OPERADOR_INTERVAL = 'INTERVAL';

        protected const OPERADOR_ALL = 'ALL';
        protected const OPERADOR_DISTINT = 'DISTINT';
        protected const OPERADOR_GROUP_BY = 'GROUP BY';
        protected const OPERADOR_GROUP_BY_ASC = 'ALL';
        protected const OPERADOR_GROUP_BY_DESC = 'DESC';
        protected const OPERADOR_LIMIT = 'LIMIT';
        protected const OPERADOR_ORDER_BY = 'ORDER BY';
        protected const OPERADOR_ORDER_BY_ASC = 'ASC';
        protected const OPERADOR_ORDER_BY_DESC = 'DESC';

        protected static $gramar; /*Define a gramatica que deverá ser utilizada, */
        protected static $operadores; /*Define um array de operadores de acordo com driver utilizado*/
        protected static $opr_select;


        /**
         * Gramar constructor.
         * @param string $gramar
         * @param array  $operadores
         * @param array  $opr_select
         */
        function  __construct ( $gramar = 'mysql')
        {
            $this->setGramar($gramar);
            self::excOperadores();
            self::excOperadores();

        }

        /**
         * @return mixed
         */
        public function getGramar ()
        {
            return self::$gramar;
        }

        /**
         * @param mixed $gramar
         */
        public function setGramar ( $gramar )
        {
            if (!isset(self::$gramar)){
                self::$gramar = $gramar;
            }
        }

        /**
         * @return mixed
         */
        public function getOperadores ()
        {
            return self::$operadores;
        }

        /**
         * @param mixed $operadores
         */
        public function setOperadores ( $operadores )
        {
            if (!isset(self::$operadores)){
                self::$operadores = $operadores;
            }
        }

        /**
         * @return mixed
         */
        public function getOprSelect ()
        {
            return self::$opr_select;
        }

        /**
         * @param mixed $opr_select
         */
        public function setOprSelect ( $opr_select )
        {
            if (!isset(self::$opr_select)){
                self::$opr_select = $opr_select;
            }
        }

        protected static function excOperadores(){
            $opr  = NULL;
            switch (self::getGramar()){
                case 'mysql' || 'MYSQL':
                    $opr[] = [
                        'LOGICOS'       => [
                            'E'             => self::OPERADOR_E,
                            'OU'            => self::OPERADOR_OU,
                            'NOT'           => self::OPERADOR_NOT,
                            'XOR'           => self::OPERADOR_XOR,
                            'NOT_NULL'      => self::OPERADOR_NOT_NULL,
                            'IS_NULL'       => self::OPERADOR_IS_NULL
                        ],
                        'COMPARACAO'    => [
                            'IGUAL'         => self::OPERADOR_IGUAL,
                            'MAIOR'         => self::OPERADOR_MAIOR,
                            'MAIOR_IGUAL'   => self::OPERADOR_MAIOR_IGUAL,
                            'MENOR'         => self::OPERADOR_MENOR,
                            'MENOR_IGUAL'   => self::OPERADOR_MENOR_IGUAL,
                            'DIFERENTE'     => self::OPERADOR_DIFERENTE,
                            'IGUAL_NULL'    => self::OPERADOR_IGUAL_NULL

                        ],
                        'ARITMETICOS'   => [
                            'ADD'           => self::OPERADOR_SOMA,
                            'SUB'           => self::OPERADOR_SUB,
                            'MULT'          => self::OPERADOR_MULT,
                            'DIV'           => self::OPERADOR_DIV
                        ],
                        'MYSQL' => [
                            'ENTRE'         => self::OPERADOR_BETWEEN,
                            'IN'            => self::OPERADOR_IN,
                            'NOT_IN'        => self::OPERADOR_NOT_IN,
                            'COALESCE'      => self::OPERADOR_COALESCE,
                            'INTERVAL'      => self::OPERADOR_INTERVAL
                        ]
                    ];

                     self::setOperadores($opr);
                     return self::getOperadores();
                break;
                case 'sqlite':
                    echo 'Gramatica em atualização';
                        exit();
                    break;
            }
        }
        protected static function excSelect(){
            $selectOpr = null;
            switch (self::getGramar()){
                case 'mysql':
                    $selectOpr[] = [
                        'RESULTS' => [
                            'ALL'     => self::OPERADOR_ALL,
                            'DISTINT' => self::OPERADOR_DISTINT,
                        ],
                        'WHERE' => [
                            'GROUP_BY' => [
                                'GROUP_BY'      => self::OPERADOR_GROUP_BY,
                                'GROUP_BY_ASC'  => self::OPERADOR_GROUP_BY_ASC,
                                'GROUP_BY_DESC' => self::OPERADOR_GROUP_BY_DESC
                            ],
                            'ORDER_BY' => [
                                'ORDER_BY'      => self::OPERADOR_ORDER_BY,
                                'ORDER_BY_ASC'  => self::OPERADOR_ORDER_BY_ASC,
                                'ORDER_BY_DESC' => self::OPERADOR_ORDER_BY_DESC
                            ],
                            'LIMIT' => self::OPERADOR_LIMIT
                        ]
                    ];
                    self::setOprSelect($selectOpr);
                    return self::getOprSelect();
                break;
            }
        }
    }