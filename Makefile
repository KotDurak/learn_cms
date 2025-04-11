build:
	 docker build --tag koter .
run:
	docker run --rm -p 4000:4000 -v "$(shell pwd)":/app --name=learn_cms koter
bash:
	docker exec -it learn_cms /bin/bash
up:
	docker-compose up
cli:
	docker-compose exec app  /bin/bash