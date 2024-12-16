Here’s a comprehensive list of **`kubectl` commands**, organized by category, to help you manage Kubernetes clusters effectively. These commands cover basic, advanced, and debugging operations.

---

### **General Commands**
1. **Get Help**
   ```bash
   kubectl help
   ```

2. **View Kubernetes Version**
   ```bash
   kubectl version
   kubectl version --short # Brief output
   ```

3. **View Current Context**
   ```bash
   kubectl config current-context
   ```

4. **Set Context/Namespace**
   ```bash
   kubectl config use-context <context-name>
   kubectl config set-context --current --namespace=<namespace-name>
   ```

---

### **Resource Information**

1. **Get Resources**
   ```bash
   kubectl get pods                   # List pods in the current namespace
   kubectl get pods -n <namespace>    # List pods in a specific namespace
   kubectl get deployments            # List deployments
   kubectl get services               # List services
   kubectl get nodes                  # List nodes in the cluster
   kubectl get namespaces             # List namespaces
   kubectl get ingress                # List ingress resources
   kubectl get configmap              # List ConfigMaps
   kubectl get secrets                # List secrets
   kubectl get events                 # List events
   kubectl get all                    # List all resources in the current namespace
   kubectl get all -n <namespace>     # List all resources in a specific namespace
   ```

2. **Describe Resources**
   ```bash
   kubectl describe pod <pod-name>
   kubectl describe deployment <deployment-name>
   kubectl describe service <service-name>
   kubectl describe node <node-name>
   kubectl describe namespace <namespace>
   ```

---

### **Create Resources**

1. **Create Resources Directly**
   ```bash
   kubectl create namespace <namespace-name>
   kubectl create deployment <deployment-name> --image=<image-name>
   kubectl create service clusterip <service-name> --tcp=80:80
   kubectl create configmap <configmap-name> --from-literal=key=value
   kubectl create secret generic <secret-name> --from-literal=username=my-user --from-literal=password=my-pass
   ```

2. **Create Resources from Files**
   ```bash
   kubectl apply -f <file.yaml> # Declaratively create or update resources
   ```

---

### **Update Resources**

1. **Edit Resources**
   ```bash
   kubectl edit pod <pod-name>
   kubectl edit deployment <deployment-name>
   ```

2. **Scale Deployment**
   ```bash
   kubectl scale deployment <deployment-name> --replicas=<number>
   ```

3. **Apply Changes from File**
   ```bash
   kubectl apply -f <file.yaml>
   ```

---

### **Delete Resources**

1. **Delete Specific Resources**
   ```bash
   kubectl delete pod <pod-name>
   kubectl delete deployment <deployment-name>
   kubectl delete service <service-name>
   kubectl delete namespace <namespace>
   kubectl delete node <node-name>
   kubectl delete ingress <ingress-name>
   ```

2. **Delete All Resources**
   ```bash
   kubectl delete pods --all
   kubectl delete deployments --all
   kubectl delete all --all              # Delete all resources in the namespace
   kubectl delete all --all -n <namespace>
   ```

3. **Delete Resources from File**
   ```bash
   kubectl delete -f <file.yaml>
   ```

---

### **Namespace Commands**

1. **List Namespaces**
   ```bash
   kubectl get namespaces
   ```

2. **Create Namespace**
   ```bash
   kubectl create namespace <namespace-name>
   ```

3. **Delete Namespace**
   ```bash
   kubectl delete namespace <namespace-name>
   ```

4. **Set Default Namespace**
   ```bash
   kubectl config set-context --current --namespace=<namespace-name>
   ```

---

### **Logs and Debugging**

1. **View Logs**
   ```bash
   kubectl logs <pod-name>
   kubectl logs <pod-name> -n <namespace>
   kubectl logs <pod-name> --previous # Logs from the previous instance of the pod
   ```

2. **Access Pod Shell**
   ```bash
   kubectl exec -it <pod-name> -- /bin/bash
   kubectl exec -it <pod-name> -c <container-name> -- /bin/sh # For multi-container pods
   ```

3. **View Events**
   ```bash
   kubectl get events
   kubectl get events --sort-by=.metadata.creationTimestamp
   ```

---

### **Port Forwarding**

1. **Forward Pod Port to Local Machine**
   ```bash
   kubectl port-forward pod/<pod-name> <local-port>:<pod-port>
   kubectl port-forward service/<service-name> <local-port>:<service-port>
   ```

---

### **Cluster Management**

1. **View Node Status**
   ```bash
   kubectl get nodes
   kubectl describe nodes
   ```

2. **Drain and Cordon Nodes**
   ```bash
   kubectl drain <node-name> --ignore-daemonsets --force
   kubectl cordon <node-name>    # Mark node as unschedulable
   kubectl uncordon <node-name>  # Mark node as schedulable
   ```

3. **Cluster Info**
   ```bash
   kubectl cluster-info
   ```

---

### **Configuration Management**

1. **View Current Configuration**
   ```bash
   kubectl config view
   ```

2. **Set Context**
   ```bash
   kubectl config use-context <context-name>
   ```

3. **Switch Cluster**
   ```bash
   kubectl config set-cluster <cluster-name>
   ```

---

### **Autoscaling**

1. **Set Horizontal Pod Autoscaler**
   ```bash
   kubectl autoscale deployment <deployment-name> --min=1 --max=5 --cpu-percent=80
   ```

2. **View Autoscaler**
   ```bash
   kubectl get hpa
   ```

---

### **Custom Resource Management (CRDs)**

1. **List CRDs**
   ```bash
   kubectl get crd
   ```

2. **Apply a Custom Resource**
   ```bash
   kubectl apply -f <custom-resource.yaml>
   ```

3. **Delete a Custom Resource**
   ```bash
   kubectl delete -f <custom-resource.yaml>
   ```

---

### **Advanced Commands**

1. **Rollout Management**
   ```bash
   kubectl rollout status deployment/<deployment-name>  # Check rollout status
   kubectl rollout history deployment/<deployment-name> # View rollout history
   kubectl rollout undo deployment/<deployment-name>    # Roll back to the previous version
   ```

2. **Resource Usage**
   ```bash
   kubectl top nodes     # Show resource usage of nodes
   kubectl top pods      # Show resource usage of pods
   ```

---

### Summary

This list covers a broad spectrum of `kubectl` commands used for managing Kubernetes clusters, resources, and configurations. For more detailed help on any command, use:

```bash
kubectl <command> --help
```