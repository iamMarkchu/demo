# -*- coding: utf-8 -*-
import tensorflow as tf
import os
os.environ['TF_CPP_MIN_LOG_LEVEL']='2'    # 去掉编译警告
# tensorflow constant
node1 = tf.constant(3.0, dtype=tf.float32)
print(node1)

# 加法
node2 = tf.add(node1, node1)
print(node2)

# tf session
sess = tf.Session()
print(sess.run(node1))
print(sess.run(node2))

# tf placeholder
a = tf.placeholder(tf.float32)
b = tf.placeholder(tf.float32)
adder_node = a + b  # + provides a shortcut for tf.add(a, b)
add_and_triple = adder_node * 3
print(sess.run(adder_node, {a: 3, b: 4.5}))
print(sess.run(add_and_triple, {a: 3, b: 4.5}))