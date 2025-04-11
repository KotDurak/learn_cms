CREATE TABLE employees (
                           id SERIAL PRIMARY KEY,
                           name VARCHAR(100),
                           department VARCHAR(50),
                           salary NUMERIC(10, 2)
);

-- Заполняем данными
INSERT INTO employees (name, department, salary) VALUES
                                                     ('Иван Петров', 'IT', 120000),
                                                     ('Мария Сидорова', 'IT', 95000),
                                                     ('Алексей Иванов', 'HR', 75000),
                                                     ('Елена Кузнецова', 'HR', 80000),
                                                     ('Дмитрий Смирнов', 'Sales', 110000),
                                                     ('Ольга Васильева', 'Sales', 105000),
                                                     ('Сергей Козлов', 'IT', 130000);

CREATE TABLE sales (
                       id SERIAL PRIMARY KEY,
                       product VARCHAR(100),
                       month DATE,
                       revenue NUMERIC(10, 2)
);

-- Заполняем данными
INSERT INTO sales (product, month, revenue) VALUES
                                                ('Ноутбук', '2023-01-01', 500000),
                                                ('Ноутбук', '2023-02-01', 450000),
                                                ('Ноутбук', '2023-03-01', 600000),
                                                ('Телефон', '2023-01-01', 300000),
                                                ('Телефон', '2023-02-01', 350000),
                                                ('Телефон', '2023-03-01', 400000),
                                                ('Планшет', '2023-01-01', 200000),
                                                ('Планшет', '2023-02-01', 150000),
                                                ('Планшет', '2023-03-01', 250000);
CREATE TABLE students (
                          id SERIAL PRIMARY KEY,
                          name VARCHAR(100),
                          group_name VARCHAR(50)
);

-- Создаем таблицу оценок
CREATE TABLE grades (
                        student_id INTEGER REFERENCES students(id),
                        subject VARCHAR(100),
                        grade INTEGER,
                        exam_date DATE
);

-- Заполняем данными
INSERT INTO students (name, group_name) VALUES
                                            ('Алексей Иванов', 'Группа 101'),
                                            ('Мария Петрова', 'Группа 101'),
                                            ('Сергей Смирнов', 'Группа 102'),
                                            ('Ольга Кузнецова', 'Группа 102'),
                                            ('Дмитрий Васильев', 'Группа 101');

INSERT INTO grades (student_id, subject, grade, exam_date) VALUES
                                                               (1, 'Математика', 5, '2023-01-10'),
                                                               (1, 'Физика', 4, '2023-01-15'),
                                                               (2, 'Математика', 4, '2023-01-10'),
                                                               (2, 'Физика', 5, '2023-01-15'),
                                                               (3, 'Математика', 3, '2023-01-10'),
                                                               (3, 'Физика', 4, '2023-01-15'),
                                                               (4, 'Математика', 5, '2023-01-10'),
                                                               (4, 'Физика', 5, '2023-01-15'),
                                                               (5, 'Математика', 4, '2023-01-10'),
                                                               (5, 'Физика', 3, '2023-01-15');