# Задание
1. Напишите класс базового контроллера. Добавьте в него метод-диспетчер вызова действия.
   Этот метод должен делать следующее:
      - Вызвать метод access() контроллера. Если получен результат false - вывести сообщение "Доступ закрыт" и прекратить работу
      - Вызвать действие
5. Создайте контроллеры для клиентских страниц новостей ("все новости", "одна новость") и для админ-панели ("все новости", "редактирование", "сохранение")
6. Продумайте систему адресов. Например так: index.php?ctrl=CTRL, где СTRL - имя контроллера. Напишите фронт-контроллер в соответствии с этой системой адресов.
7. Подумайте - не сделать ли для админ-панели другую точку входа? А может быть другой базовый контроллер? Если решите, что это обоснованно - сделайте.
8. \* Создайте систему ЧПУ. Адрес вида /XXX/YYY/ZZZ должен транслироваться в контроллер XXX\YYY (вложенность пространств имен неограничена) и действие ZZZ