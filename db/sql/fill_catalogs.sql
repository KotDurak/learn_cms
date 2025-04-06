CREATE OR REPLACE FUNCTION random_string(length integer) RETURNS TEXT AS $$
DECLARE
chars TEXT := 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    result TEXT := '';
    i INTEGER := 0;
BEGIN
FOR i IN 1..length LOOP
            result := result || substr(chars, floor(random() * length(chars) + 1)::integer, 1);
END LOOP;
RETURN result;
END;
$$ LANGUAGE plpgsql;

-- Основной скрипт наполнения таблицы
DO $$
    DECLARE
        -- Категории товаров
categories TEXT[] := ARRAY[
            'Ноутбук', 'Монитор', 'Процессор', 'Видеокарта', 'Материнская плата',
            'Оперативная память', 'Жесткий диск', 'SSD', 'Блок питания', 'Корпус',
            'Клавиатура', 'Мышь', 'Наушники', 'Колонки', 'Микрофон',
            'Веб-камера', 'Принтер', 'Сканер', 'МФУ', 'Роутер',
            'ИБП', 'Охлаждение', 'Термопаста', 'Аксессуар', 'Кабель',
            'Холодильник', 'Стиральная машина', 'Пылесос', 'Микроволновая печь', 'Духовка',
            'Варочная панель', 'Посудомоечная машина', 'Чайник', 'Кофеварка', 'Блендер',
            'Мясорубка', 'Миксер', 'Тостер', 'Фен', 'Утюг',
            'Обогреватель', 'Вентилятор', 'Кондиционер', 'Очиститель воздуха', 'Увлажнитель'
            ];

        -- Бренды
        brands TEXT[] := ARRAY[
            'ASUS', 'Acer', 'Lenovo', 'HP', 'Dell',
            'Apple', 'MSI', 'Samsung', 'LG', 'Sony',
            'Intel', 'AMD', 'NVIDIA', 'Kingston', 'Corsair',
            'Western Digital', 'Seagate', 'Crucial', 'HyperX', 'Logitech',
            'Razer', 'SteelSeries', 'Bosch', 'Siemens', 'Indesit',
            'Beko', 'Philips', 'Tefal', 'Scarlett', 'Polaris',
            'Redmond', 'Vitek', 'Braun', 'Moulinex', 'Zanussi'
            ];

        -- Модельные суффиксы
        suffixes TEXT[] := ARRAY[
            'Pro', 'Lite', 'Max', 'Ultra', 'Plus',
            'Gold', 'Silver', 'Platinum', 'Deluxe', 'Premium',
            'Standard', 'Elite', 'Extreme', 'Gaming', 'Office',
            'Home', 'Business', 'Travel', 'Portable', 'Wireless'
            ];

        i INTEGER;
        product_name TEXT;
        category TEXT;
        brand TEXT;
        suffix TEXT;
        model_num TEXT;
BEGIN
FOR i IN 1..1000 LOOP
                -- Выбираем случайные элементы из массивов
                category := categories[1 + floor(random() * array_length(categories, 1))::integer];
                brand := brands[1 + floor(random() * array_length(brands, 1))::integer];
                suffix := suffixes[1 + floor(random() * array_length(suffixes, 1))::integer];

                -- Генерируем номер модели
                model_num := floor(random() * 9000 + 1000)::text;

                -- Формируем название продукта
                IF random() > 0.3 THEN
                    product_name := brand || ' ' || category || ' ' || model_num;
ELSE
                    product_name := brand || ' ' || category || ' ' || suffix || ' ' || model_num;
END IF;

                -- 10% chance to add some special edition
                IF random() > 0.9 THEN
                    product_name := product_name || ' Special Edition';
END IF;

                -- Вставляем запись в таблицу
INSERT INTO catalogs (name) VALUES (product_name);
END LOOP;
END $$;