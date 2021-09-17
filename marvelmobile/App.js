import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { ViewComics, Login } from './Screens.js'
import { createStackNavigator } from '@react-navigation/stack';
import { NavigationContainer } from '@react-navigation/native';

const Root = createStackNavigator()

export default function App() {
  return (
    <NavigationContainer>
          <Root.Navigator>
            <Root.Screen name="Login" component={Login} />
            <Root.Screen name="Comics" component={ViewComics} />
          </Root.Navigator>
      </NavigationContainer>
  );
}


const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
