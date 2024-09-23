
Here’s your Docker command file with proper comments:

```bash
# Build Docker image with a specific tag (v1)
docker build -t web-image:v1 .

# Build Docker image without specifying a version tag (default will be "latest")
docker build -t web-image .

# List all Docker images available on the system
docker images

# Start the container, mapping port 9000 on the host to port 80 in the container.
# The -d flag runs the container in detached mode (in the background).
docker run -d -p 9000:80 web-image
```

### Explanation of Comments:

- **`# Build Docker image with a specific tag (v1)`**: This comment explains that the first command builds the Docker image and assigns a custom version tag (`v1`).
- **`# Build Docker image without specifying a version tag`**: This explains the default behavior when no version tag is provided (`latest` is assumed).
- **`# List all Docker images available on the system`**: Describes the purpose of the `docker images` command.
- **`# Start the container, mapping port 9000 on the host to port 80 in the container`**: Clarifies the `docker run` command, explaining that port `9000` on the host machine is mapped to port `80` in the Docker container. The `-d` flag ensures the container runs in detached mode.