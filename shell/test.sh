#! /usr/bin/bash
# scp 数据库文件 并删除较老的数据库文件
shell_dir='/home/mark/shell'
data_dir='/home/mark/data'
# scp be01.bwe.io:/tmp/id_rsa.pub ./
# 备份数据库文件数据
mysql_files='promocodes2014_new_base couponwitme_base ss_stat mk_phpcron_base ss_fashion ssfr_base ssde_base'
for file in ${mysql_files};
do
    echo $file;
done