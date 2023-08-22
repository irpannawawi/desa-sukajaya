<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_masyarakat extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'nik' => [
                                'type' => 'varchar',
                                'constraint' => 18,
                        ],
                        'nama' => [
                                'type' => 'VARCHAR',
                                'constraint' => '155',
                        ],
                        'alamat' => [
                            'type' => 'TEXT'
                        ],
                        'tempat_lahir' => [
                                'type' => 'VARCHAR',
                                'constraint' => '155',
                        ],
                        'tanggal_lahir' => [
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                        ],
                        'jenis_kelamin' => [
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ],
                        'agama' => [
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ],
                        'status_perkawinan' => [
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                        ],
                        'pekerjaan' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'gol_darah' => [
                                'type' => 'VARCHAR',
                                'constraint' => '5',
                        ],

                ));
                $this->dbforge->add_key('nik', TRUE);
                $this->dbforge->create_table('masyarakat');
        }

        public function down()
        {
                $this->dbforge->drop_table('masyarakat');
        }
}