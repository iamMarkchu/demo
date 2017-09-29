# -*- coding: utf-8 -*-
import tensorflow as tf
import os
os.environ['TF_CPP_MIN_LOG_LEVEL']='2'    # 去掉编译警告

y = tf.placeholder(tf.float32, [2, 3])
m = tf.placeholder(tf.float32, [2, 3])
a = tf.argmax(y, 0)
b= tf.equal(y, m)
c = tf.reduce_mean(tf.cast(b, tf.float32), 1)
init = tf.global_variables_initializer()
sess = tf.Session()
sess.run(init)
print(sess.run(c, feed_dict={y: [[1, 2, 3], [4, 5, 6]], m: [[1, 3, 3], [5, 5, 6]]}))