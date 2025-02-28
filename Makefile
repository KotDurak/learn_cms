build:
	 docker build --tag koter .
run:
	docker run --rm -p 4000:4000 -v "$(shell pwd)":/app koter
bash:
	docker exec -it {containerName} /bin/bash
