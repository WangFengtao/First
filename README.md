# First #
***
## 数据库索引相关知识
### 慢查询优化基本步骤
0.先运行看看是否真的很慢，注意设置SQL_NO_CACHE <br>
1.where条件单表查，锁定最小返回记录表。这句话的意思是把查询语句的where都应用到表中返回的记录数最小的表开始查起，单表每个字段分别查询，看哪个字段的区分度最高<br>
2.explain查看执行计划，是否与1预期一致（从锁定记录较少的表开始查询）<br>
3.order by limit 形式的sql语句让排序的表优先查<br>
4.了解业务方使用场景<br>
5.加索引时参照建索引的几大原则<br>
6.观察结果，不符合预期继续从0分析<br>
7
