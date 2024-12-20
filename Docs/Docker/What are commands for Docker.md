Docker uses a set of command-line interface (CLI) commands to manage containers, images, networks, and more. Below are some of the commonly used Docker commands, categorized by functionality:

### 1. **Docker System Commands**
These commands are related to the overall Docker system and environment.

- **`docker version`**: Show Docker version and installed components.
- **`docker info`**: Display system-wide information about Docker (e.g., number of containers, images, etc.).
- **`docker stats`**: Display real-time stats (CPU, memory, network) of running containers.

### 2. **Container Lifecycle Commands**
These commands are used to manage the lifecycle of containers.

- **`docker run [options] IMAGE [command]`**: Create and start a new container from an image.
    - Example: `docker run -it ubuntu bash` (Runs an Ubuntu container interactively with a Bash shell).
  
- **`docker start CONTAINER_ID`**: Start a stopped container.
  
- **`docker stop CONTAINER_ID`**: Stop a running container gracefully.
  
- **`docker restart CONTAINER_ID`**: Restart a running or stopped container.
  
- **`docker kill CONTAINER_ID`**: Forcefully stop a container.

- **`docker rm CONTAINER_ID`**: Remove a stopped container.
  
- **`docker ps`**: List running containers.
    - **`docker ps -a`**: List all containers (running and stopped).

### 3. **Container Management Commands**
These commands are for interacting with and managing running containers.

- **`docker exec -it CONTAINER_ID COMMAND`**: Run a command in a running container.
    - Example: `docker exec -it my_container bash` (Open a shell in the container).

- **`docker logs CONTAINER_ID`**: View logs from a container.
  
- **`docker top CONTAINER_ID`**: Display running processes in a container.
  
- **`docker inspect CONTAINER_ID`**: Return detailed information about a container in JSON format.

### 4. **Docker Image Commands**
These commands manage Docker images (pre-packaged environments).

- **`docker pull IMAGE`**: Download an image from Docker Hub or another registry.
    - Example: `docker pull nginx` (Download the official Nginx image).
  
- **`docker build [options] PATH | URL | -`**: Build a Docker image from a Dockerfile.
    - Example: `docker build -t my_app:latest .` (Builds an image with the tag `my_app:latest` from the current directory).

- **`docker images`**: List images stored on the local system.
  
- **`docker rmi IMAGE_ID`**: Remove an image.
  
- **`docker tag IMAGE_ID new_tag`**: Tag an image with a new name.
  
- **`docker push IMAGE`**: Push an image to a registry like Docker Hub.

### 5. **Volume Commands**
Volumes are used to persist data generated by and used in Docker containers.

- **`docker volume create`**: Create a new volume.
  
- **`docker volume ls`**: List all volumes.
  
- **`docker volume inspect VOLUME_NAME`**: Get detailed information about a volume.
  
- **`docker volume rm VOLUME_NAME`**: Remove a volume.

### 6. **Network Commands**
Networking in Docker allows containers to communicate with each other or the outside world.

- **`docker network create NETWORK_NAME`**: Create a new network.
  
- **`docker network ls`**: List all networks.
  
- **`docker network inspect NETWORK_NAME`**: Get detailed information about a network.
  
- **`docker network connect NETWORK_NAME CONTAINER_ID`**: Connect a container to a network.
  
- **`docker network disconnect NETWORK_NAME CONTAINER_ID`**: Disconnect a container from a network.

### 7. **Docker Compose Commands**
Docker Compose is used to manage multi-container applications defined in `docker-compose.yml` files.

- **`docker-compose up`**: Create and start containers as defined in `docker-compose.yml`.
  
- **`docker-compose down`**: Stop and remove containers, networks, and volumes created by `docker-compose up`.
  
- **`docker-compose ps`**: List the status of containers defined in the `docker-compose.yml` file.
  
- **`docker-compose logs`**: View logs of all containers managed by Docker Compose.

### 8. **Clean-up Commands**
To manage space and remove unused resources.

- **`docker system prune`**: Remove unused containers, images, and networks.
  
- **`docker image prune`**: Remove unused images.
  
- **`docker container prune`**: Remove all stopped containers.

### 9. **Other Useful Commands**
- **`docker commit CONTAINER_ID IMAGE_NAME`**: Create a new image from a container's changes.
- **`docker save IMAGE_NAME > file.tar`**: Save an image to a tar file.
- **`docker load < file.tar`**: Load an image from a tar file.

These commands allow you to manage Docker effectively for development, testing, and production environments.