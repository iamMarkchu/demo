# -*- coding: utf-8 -*-
import tensorflow as tf
import os
os.environ['TF_CPP_MIN_LOG_LEVEL']='2'    # 去掉编译警告

a = tf.Variable([[1, 1, 4], [3, 7, 3], [2, 3, 3]])
b = tf.Variable([[1, 1, 1], [1, 1, 1], [1, 1, 1]])
c = tf.matmul(a, b)
init = tf.global_variables_initializer()
sess = tf.Session()
sess.run(init)
print(sess.run(c))