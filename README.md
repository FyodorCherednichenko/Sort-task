Первая часть. Сделать сортировку по таблице одним запросом.

Например, имеются элементы:

ID 	SORT 	NAME
1	1		Первый
2	2		Второй
3	3		Третий

Сделать функцию, которая поменяет элементы местами, например сделает второй после третьего, или третий перед первым.
Функция имеет два аргумента: 
- какой элемент перемещаем
- за каким элементом он будет стоять. 0 - в начале списка

например: Sort(1, 3); // Поместит первый элемент после третьего, выдача:

ID 	SORT 	NAME
2	1		Второй
3	2		Третий
1	3		Первый

А теперь поместим "Второй" после "третий": Sort(2, 3);
Пример результата:
ID 	SORT 	NAME
3	1		Третий
2	2		Второй
1	3		Первый


Сам процесс сортировки (UPDATE) должен включать в себя строго один запрос. Количество SELECT запросов не ограничено.

Вторая часть. Сделать функцию, которая вернёт сортировку по ID.
Пример данных до сброса сортировки:
ID 	SORT 	NAME
35	1		Третий
22	2		Второй
1	3		Первый

После:
ID 	SORT 	NAME
1	1		Первый
22	2		Второй
35	3		Третий

Так же как и с первой частью, процесс сброса сортировки должен включать один UPDATE запрос. Количество SELECT запросов не ограничено. После выдачи не должно быть "дыр" в значении сортировки, должна идти 1-2-3-4-5, последовательно.

Время выполнения задания: до четырёх часов, оптимальное: до двух часов.
