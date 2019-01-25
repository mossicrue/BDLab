### **INSTANCE_MULTIPLIER WORKAROUND [BZ 1664614](https://bugzilla.redhat.com/show_bug.cgi?id=1664614)** ###

Due to this bug, we had to do a manual check of the subscription to attach on the host in order to calculate the correct value of `instance_multiplier`.

**Description of problem:**

Output provided by this 2 Satellite API Functions:

```
GET /katello/api/organizations/:organization_id/subscriptions/:id
GET /katello/api/subscriptions/:id
```
  
return `instance_multiplier` with value always setted to **1**.

This is incorrect as subscription like *RHEL Premium for Physical or Virtual Nodes* requires to be attached with a quantity that is multiple of **2**.

The correct value is retrieved by calling ```GET /katello/api/organizations/:organization_id/subscriptions``` API passing as parameters:

```ruby
:available_for = "host"
:host_id = <the id of the host we need to attach>
```

Tests that was maded using various type of subscriptions and return that:

**A.** This subs has 1 as instance_multiplier

  - VDC Subs (VDC RHEL, VDC ESL and VDC Smart Management) to attach on an Hypervisor
  - VDC Subs to attach on a virtual server that is on Fully Entitled Hypervisor
  - Self-support subscriptions for physical or virtual nodes as "Red Hat Enterprise Linux Server Entry Level, Self-support", "Red Hat Enterprise Linux Server for HPC Compute Node, Self-support (1-2 sockets) (Up to 1 guest)" and "Smart Management for Red Hat Enterprise Linux Server for HPC Compute Node (Up to 1 guest)"

**B.** This subs has 2 as instance_multiplier: 

- *Red Hat Enterprise Linux Server, Standard (Physical or Virtual Nodes)*
- *Red Hat Enterprise Linux Server, Premium (Physical or Virtual Nodes)*
- *Smart Management*
- *Red Hat Enterprise Linux Extended Life Cycle Support (Physical or Virtual Nodes)*


The workaorund code simply checks if the host is **Physical** and need to attach one of the subscriptions in the B list, as only Physical servers may need instance_multiplier **2**.
**Hypervisor**'s subscriptions has `instance_multiplier` set to **1** and Virtual Guest need only **1** sub (fixed value)
