import { StatusBar } from 'expo-status-bar';
import React, { useState, useEffect } from 'react';
import { StyleSheet, Text, View, ScrollView, TextInput, Button } from 'react-native';

const ViewComics = ({ navigation, route }) => {

  const data = route.paramA;
  var elementArray = []

  elementArray = array.map(comics => (
         <View style={styles.pad}>
          <View style={styles.box}>
            <Text style={styles.text}>
              Id: {comics.comicid}
            </Text>
          </View>
          <View style={styles.box}>
            <Text style={styles.text}>
              Title: {comics.title}
            </Text>
          </View>
          <View style={styles.box}>
            <Text style={styles.text}>
              Description: {comics.description}
            </Text>
          </View>
          <View style={styles.box}>
            <Text style={styles.text}>
              Ean: {comics.ean}
            </Text>
          </View>
          <View style={styles.box}>
            <Text style={styles.text}>
             Price: {comics.price}
            </Text>
          </View>
        </View>
          )
        )

  return (
    <ScrollView style={styles.container}>
    {elementArray}
    </ScrollView>
        )
}

const Login = ({ navigation, route }) => {

  const [senha, setSenha] = useState('');
  const [email, setEmail] = useState('');

  async function loginTry() {
    const comicsData = await fetch('localhost/mobilelogin', {
      method: "POST",
      body: {
        "email": email,
        "senha": senha
      }
    });

    navigation.push('ViewComics', {paramA: comicsData});
  }

    return (
      <View>
      <TextInput
       value={email}
       placeholder="e-mail"
       onChangeText={(email) => {
          setEmail(email)
        }}
      />
      <TextInput
       value={senha}
       placeholder="senha"
       onChangeText={(senha) => {
          setSenha(senha)
        }}
      />
      <Button
         title={'submit'}
         onPress={() => {
           loginTry();
         }}
       />
      </View>
    )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff'
  },
  text: {
   backgroundColor: 'white',
   color: '#4A90E2',
   fontSize: 16,
   padding: 5,
 },
 box: {
    backgroundColor: "white",
    borderColor: "#D3D3D3",
    borderBottomWidth: 1,
    width: "100%"
  },
  pad: {
    padding: 14
  }
});

export { ViewComics, Login }
