//
//  HomePage.swift
//  CheckInVN2
//
//  Created by PPPP on 11/02/2023.
//

import SwiftUI

struct HomePage: View {
    var body: some View {
        VStack {
            ZStack {
                Text("Seasons").font(/*@START_MENU_TOKEN@*/.title/*@END_MENU_TOKEN@*/)
                HStack(spacing: 18) {
                    Button(action: {
                    }) {
                        Image("Menu").renderingMode(.original)
                    }
                    
                    Spacer()
                    Button(action: {
                    }) {
                        Image("search").renderingMode(.original)
                    }
                    Button(action: {
                    }) {
                        Image("bell").renderingMode(.original)
                    }
                    Button(action: {
                    }) {
                        Image("bag").renderingMode(.original)
                    }
                }
            }
            .background(Color.white)
            .padding([.leading, .trailing, .top], 15)
            ZStack {
                Color("Color")
            }
        }
    }
}

struct HomePage_Previews: PreviewProvider {
    static var previews: some View {
        HomePage()
    }
}
