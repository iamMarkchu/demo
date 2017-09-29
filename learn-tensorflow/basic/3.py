# -*- coding: utf-8 -*-
import tensorflow as tf
import os
os.environ['TF_CPP_MIN_LOG_LEVEL']='2'    # 去掉编译警告
from tensorflow.examples.tutorials.mnist import input_data
mnist = input_data.read_data_sets('./MNIST_DATA', one_hot=True)
x = tf.placeholder(tf.float32, [2, 3])
y = tf.placeholder(tf.float32, [3, 2])
m = tf.matmul(x, y)
sess = tf.Session()
f = sess.run(m, feed_dict={x: [[1,2,3],[4,5,6]], y:[[1,4],[2,5],[3,6]]})
print(f)
